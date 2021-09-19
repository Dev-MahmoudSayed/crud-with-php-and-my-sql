<?php  include('inc/header.php'); ?>

<?php  include('inc/validation.php'); ?>
<?php
    
   
     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
     {
         foreach($_POST as $key=>$value)
         {
            $$key = sanVal($value);
        
         }
         //validate name
         if( reqVal($name)){
            $error[] ="please fill the name field";
           
           
        }elseif( minVal($name,4)){
            $error[] ="name must be greater than 4";
           
        }elseif( maxVal($name,20)){
            $error[] ="name must be smaller than 20";
            
        }
        // validate email
           if(reqVal($email)){
            $error[] ="please fill the email field";
            
           }elseif(!emailVal($email)){
               $error[] = "please type correct email";
           }

        //   validate password 
        // if(reqVal($password)){
        //     $error[] ="please fill the password field";
            
        // }elseif( minVal($password,4)){
        //     $error[] ="password must be greater than 4";
          
        // }elseif( maxVal($password,20)){
        //     $error[] ="password must be smaller than 20";    
        // }
        $_SESSION['errors']= $error;
        if(empty($error)){
            if($password)
            {
                $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
                $sql= "UPDATE `users` SET `user_name`='$name' , `user_email`='$email',`user_password`='$hashed_pass'
                WHERE `user_id`='$id'";
            }
            else
            {
                $sql= "UPDATE `users` SET `user_name`='$name' , `user_email`='$email'
                WHERE `user_id`='$id'";
            }
            
           
            $res= mysqli_query($con,$sql);
            if($res)
            {
                $success = "UPDATED Successfully";
                header("refresh:3;url=index.php");

            }
            
        }
        

     }
     
     
    

    
?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">UPDATE User</h1>
  
    <?php
            if(isset($_SESSION['errors'])):
             foreach($_SESSION['errors'] as $val ):?>
             <div class="alert alert-danger text-center">
             <?php echo $val; ?>
             </div>
             <a href="javascript:history.go(-1)" class="btn btn-primary">GO BACK >></a>
             <?php endforeach;
                   endif;
             ?>
    <?php 
             if($success):
    ?>
    <div class="alert alert-success text-center"><?php echo $success;?> </div>  
     <?php endif; ?>
<?php  include('inc/footer.php'); ?>