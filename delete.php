<?php  include('inc/header.php'); ?>

<?php 
     if(!isset($_GET['id'])&& !is_numeric($_GET['id']))
     {
        header("location:index.php");
     }
     $id=$_GET['id'];
     $sql="SELECT * FROM `users` WHERE `user_id`='$id' LIMIT 1 ";
     $res = mysqli_query($con,$sql);
     $check = mysqli_num_rows($res);
     if(!$check)
     {
        header("location:index.php");
     }
    $sql2 = "DELETE FROM `users` WHERE `user_id` = '$id' ";
   $res= mysqli_query($con,$sql2);

?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2"> User have been Deleted</h1>
  <?php header("refresh:3;url=index.php"); ?>
   
<?php  include('inc/footer.php'); ?>

 
  