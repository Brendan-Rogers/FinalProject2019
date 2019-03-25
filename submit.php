<?php
   require_once('admin/scripts/config.php');

   if(isset($_FILES['image'])){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

      $fileinfo = getimagesize($_FILES["image"]["tmp_name"]);
      $width = $fileinfo[0];
      $height = $fileinfo[1];

      $f_name = $_POST['f_name'];
      $l_name = $_POST['l_name'];
      $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
      
      $extensions= array("jpeg","jpg","png");

      if (!$email) {
         $errors[] = 'That is not an email address. Nice try!';
      }
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
         $errors[]='File size must be less then 2 MB';
      }
      if ($width != 800 || $height != 1035) {
         $errors[] = 'File must be exactly 800px wide by 1035px tall';
      }
      
      if(empty($errors)==true){
         $new_file_name = strtolower($f_name).'_'.time().'.'.$file_ext;

         move_uploaded_file($file_tmp,'images/user_images/'.$new_file_name);
         echo image_submit($f_name, $l_name, $email, $new_file_name).$width.$height;


      }else{
         print_r($errors);
      }
   }
?>

<html>
<link rel="stylesheet" href="css/master.css">

   <body id="form">

   <!--<nav>Menu</nav>-->
   <nav class="navArea op">
     <h1 class="hidden">Main Navigation</h1>

     <a href="#" class="closeButton">Close</a>

     <ul class="navList">
         <li data-menuanchor="page1" class="navOpt"><a href="index.html" class="navLink">home.</a></li>
         <li class="navOpt"><a href="index.html" class="navLink">about.</a></li>
         <li class="navOpt"><a href="gallery.php" class="navLink">gallery.</a></li>
         <li class="navOpt"><a href="events.html" class="navLink">events.</a></li>
     </ul>

     <ul class="navInfo">
         <li class="infoList">130 Dundas Street, 5th floor</li>
         <li class="infoList">London, Ontario</li>
         <li class="infoList">(555)-555-5555</li>
         <li class="infoList">Awareness@ODP.ca</li>
     </ul>
   </nav>

   <a href="#" class="menuButton menuHome">Menu</a>


      <div id="formArea">
      <div id="imagePrev" style="background-image: url(./images/lung.png);"></div>
      <div id="formContainer">
    
      <form  class="form" action="" method="POST" enctype="multipart/form-data">
         <h2>Submit your Work</h2>
        <!-- <label class="hidden">First Name:</label>-->
         <input type="text" name="f_name" placeholder="First Name">

         <br><br>

         <!--<label>Last Name:</label>-->
         <input type="text" name="l_name" placeholder="Last Name">

         <br><br> 

         <!--<label>Email Address:</label>-->
         <input type="email" name="email" placeholder="Email Address">

         <br><br>
       
         <input type="file" name="image" accept="image/*" />

         <br><br><br>
   
         <button class="btn">Upload a file</button>

         <input class="formBtn" type="submit"/>
 
      </form>
      </div>
</div>

<script src="js/nav.js"></script>

</body>
</html>






