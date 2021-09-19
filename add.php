<?php session_start(); 
include('inc/header.php'); ?>
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
        if(reqVal($password)){
            $error[] ="please fill the password field";
            
        }elseif( minVal($password,4)){
            $error[] ="password must be greater than 4";
          
        }elseif( maxVal($password,20)){
            $error[] ="password must be smaller than 20";    
        }
        $_SESSION['errors']= $error;
        if(empty($error)){
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`user_name`,`user_email`,`user_password`)
            VALUES ('$name','$email','$hashed_pass') ";
            $res= mysqli_query($con,$sql);
            if($res)
            {
                $success = "Added Successfully";
            }
            
        }
        

     }
     
     
    

    
?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
    <?php
            if(isset($_SESSION['errors'])):
             foreach($_SESSION['errors'] as $val ):?>
             <div class="alert alert-danger text-center">
             <?php echo $val; ?>
             </div>
             <?php endforeach;
                   endif;
             ?>
    <?php 
             if($success):
    ?>
    <div class="alert alert-success text-center"><?php echo $success;?> </div>  
     <?php endif; ?>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
 
   
<?php  include('inc/footer.php'); ?>
<?php unset($_SESSION['errors'], $success); ?>


 
  