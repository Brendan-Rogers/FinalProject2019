<?php
   require_once('admin/scripts/config.php');

   if(isset($_FILES['image'])){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $f_name = $_POST['f_name'];
      $l_name = $_POST['l_name'];
      $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
      
      $extensions= array("jpeg","jpg","png");

      if ($email === false) {
         $errors[] = 'That is not an email address. Nice try!';
      }
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less then 2 MB';
      }
      
      if(empty($errors)==true){
         $new_file_name = strtolower($f_name).'_'.time().'.'.$file_ext;

         move_uploaded_file($file_tmp,'images/user_images/'.$new_file_name);
         echo move_new_image($f_name, $l_name, $email, $new_file_name);


      }else{
         print_r($errors);
      }
   }
?>

<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         
         <label>First Name:</label>
         <input type="text" name="f_name">

         <br><br>

         <label>Last Name:</label>
         <input type="text" name="l_name">

         <br><br>

         <label>Email Address:</label>
         <input type="email" name="email">

         <br><br>

         <input type="file" name="image" accept="image/*" />

         <br><br><br>

         <input type="submit"/>
      </form>
      
   </body>
</html>






