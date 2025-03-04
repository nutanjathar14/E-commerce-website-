<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .table {
    border-collapse: collapse;
    width: 100%;
    background-color: lightblue;
  }

   .table td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
    background-color: lightgreen;
  }

  .table th{
    border: 1px solid black;
    padding: 10px;
    text-align: center;
    background-color: grey;
  }
  </style>
</head>
<body>
<?php
$username=$_SESSION['user_name'];
$get_user = "Select * from `user_table` where user_name='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
//echo $user_id;





?>





    <h3 class="text-success text-center ">All my orders</h3>
    <table class="table table-bordered mt-5 text-center ">
        <thead class = "head">
<tr>
<th>SI NO</th>
<th>AMOUNT DUE</th>
<th>TOTAL PRODUCTS</th>
<th>INVOICE NUMBER</th>
<th>DATE</th>
<th>COMPLETE/INCOMPLETE</th>
<th>STATUS</th>


</tr>
</thead>
<tbody >
    
    

<?php
$get_order="Select * from `user_orders` where user_id=$user_id";
$result_order=mysqli_query($con,$get_order);
while($row_orders=mysqli_fetch_assoc($result_order)){
    $order_id=$row_orders['order_id'];
    $amount_due=$row_orders['amount_due'];
    $total_products=$row_orders['total_products'];
    $invoice_number=$row_orders['invoice_number'];
    $order_status=$row_orders['order_status'];
    $order_date=$row_orders['order_date'];
    if($order_status=='pending'){
        $order_status="Incomplete";
    }else{
        $order_status='Complete';
    }
    $number=1;
    echo" <tr>
    <td>$number</td>
    <td> $amount_due</td>
    <td> $total_products</td>
    <td>$invoice_number</td>
    <td>  $order_date</td>
    <td> $order_status</td>";
    ?>
    <?php
    if($order_status=='Complete'){
        echo "<td>Paid</td>";
    }else{
        echo "<td><a href='confirm_payment.php? order_id=$order_id' class='text-dark'>Confirm </a></td>
        </tr>";
    }

    
$number++;
}
?>

    </table>
</body>
</html>