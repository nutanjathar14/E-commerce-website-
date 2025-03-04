import requests
from bs4 import BeautifulSoup
import pandas as pd
import time

# Headers to mimic a real browser
headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'
}

# List of URLs to scrape
urls = [
    'https://groww.in/us-stocks/nke',
    'https://groww.in/us-stocks/ko', 
    'https://groww.in/us-stocks/msft', 
    'https://groww.in/stocks/m-india-ltd', 
    'https://groww.in/us-stocks/axp', 
    'https://groww.in/us-stocks/amgn', 
    'https://groww.in/us-stocks/aapl', 
    'https://groww.in/us-stocks/ba', 
    'https://groww.in/us-stocks/csco', 
    'https://groww.in/us-stocks/gs', 
    'https://groww.in/us-stocks/ibm', 
    'https://groww.in/us-stocks/intc', 
    'https://groww.in/us-stocks/jpm', 
    'https://groww.in/us-stocks/mcd',
    'https://groww.in/us-stocks/crm', 
    'https://groww.in/us-stocks/vz', 
    'https://groww.in/us-stocks/v', 
    'https://groww.in/us-stocks/wmt',  
    'https://groww.in/us-stocks/dis'
]

# Store extracted data
all_data = []

# Loop through each URL and scrape data
for url in urls:
    try:
        page = requests.get(url, headers=headers)
        soup = BeautifulSoup(page.text, 'html.parser')

        # Extract data from webpage
        company = soup.find('h1', {'class': 'usph14Head displaySmall'})
        price = soup.find('span', {'class': 'uht141Pri contentPrimary displayBase'})
        change = soup.find('div', {'class': 'uht141Day bodyBaseHeavy contentNegative'})
        volume = soup.find('table', {'class': 'tb10Table col l5'})

        # If elements are found, extract text
        if company and price and change and volume:
            company_name = company.text.strip()
            stock_price = price.text.strip()
            price_change = change.text.strip()
            stock_volume = volume.find_all('td')[1].text.strip()

            all_data.append([company_name, stock_price, price_change, stock_volume])
        else:
            print(f"Skipping {url}: Some elements not found.")
    
    except Exception as e:
        print(f"Error scraping {url}: {e}")

    # Wait to prevent rate-limiting
    time.sleep(5)

# Create DataFrame
df = pd.DataFrame(all_data, columns=["Company", "Price", "Change", "Volume"])

# Save to Excel
df.to_excel('stocks.xlsx', index=False)

print("Data successfully saved to stocks.xlsx")
