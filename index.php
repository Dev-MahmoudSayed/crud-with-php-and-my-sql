<?php  include('inc/header.php'); ?>
<?php 
      $sql = "SELECT * FROM `users`";
      $res = mysqli_query($con ,$sql);
 
?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">ALL Users</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(mysqli_num_rows($res) >0): ?>
                <?php $i= 1; while($row = mysqli_fetch_assoc($res)): ?>
                    <tr>
                        <th><?= $i++ ?></th>
                        <td><?= $row['user_name'] ?></td>
                        <td><?= $row['user_email'] ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?id=<?= $row['user_id']; ?>"> <i class="fa fa-edit"></i> </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?= $row['user_id']; ?>"> <i class="fa fa-close"></i> </a>
                        </td>
                  
                    <?php endwhile; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

 
  