<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-info text-center">
        <tr> 
            <th>Slno</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        include('../includes/connect.php');
        $select_cat = "SELECT * FROM `category`"; // Corrected table name from 'Category' to 'category'
        $result = mysqli_query($con, $select_cat);
        if ($result) {
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id']; // Corrected variable name from 'Category_id' to 'category_id'
                $category_name = $row['category_name']; // Corrected variable name from 'Category_name' to 'category_name'
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $category_name;?></td>
            <td><a href="index.php?edit_category=<?php echo $category_id;?>" class="text-dark"><i class="fas fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_category=<?php echo $category_id;?>" class="text-dark"><i class="fas fa-trash"></i></a></td>
        </tr>
        <?php
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        ?>
    </tbody>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
