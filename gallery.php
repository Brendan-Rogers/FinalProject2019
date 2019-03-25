<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    include('admin/scripts/config.php');

    $display = get_images(1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ODP - Gallery</title>
    <link rel="stylesheet" href="css/master.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.min.js"></script>
</head>
<body>

  <!--<nav>Menu</nav>-->
  <nav class="navArea op">
        <h1 class="hidden">Main Navigation</h1>

        <a href="#" class="closeButton">Close</a>

        <ul class="navList">
            <li data-menuanchor="page1" class="navOpt"><a href="#" class="navLink">home.</a></li>
            <li class="navOpt"><a href="#" class="navLink">about.</a></li>
            <li class="navOpt"><a href="gallery.php" class="navLink">gallery.</a></li>
            <li class="navOpt"><a href="events.html" class="navLink">events.</a></li>
            <li class="navOpt"><a href="#" class="navLink">contact.</a></li>
        </ul>

        <ul class="navInfo">
            <li class="infoList">130 Dundas Street, 5th floor</li>
            <li class="infoList">London, Ontario</li>
            <li class="infoList">(555)-555-5555</li>
            <li class="infoList">Awareness@ODP.ca</li>
        </ul>
    </nav>

    <a href="#" class="menuButton ">Menu</a>

    <main class="container page">
        <h1 class="siteTitle">ODP</h1>

        

        <ul class="imgFilter">
            <li class="filterChoice"><a href="#">All</a></li>
            <li class="filterChoice"><a href="#">Recent</a></li>
            <li class="filterChoice"><a href="#">Featured</a></li>
        </ul>



        <section class="imgSect">
            <h2 class="hidden">Gallery</h2>

            <?php  while ($row = $display->fetch(PDO::FETCH_ASSOC)): ?>

                <div class="orgPoster">
                    <img src="images/user_images/<?php echo $row['file_name']; ?>" alt="submission <?php echo $row['id']; ?>" class="orgPosterImg">
                    <h3 class="pArtist">Artist: <?php echo $row['f_name'].' '.$row['l_name']; ?></h3>
                    <h4>Submitted on <?php $date = gmdate("Y/m/d", strtotime($row['upload_time'])); echo $date; ?></h4>
                </div>

            <?php endwhile; ?>


        </section>

        <footer>
            <h2 class="hidden">Main Footer</h2>

            
            <h1 class="siteTitle">ODP</h1>

            <h4 class="copyright"><span class="centerer"></span><span class="centered">copyright@odp</span></h4>

        </footer>
    </main>

    <section class="lightbox">
		<h2 class="hidden">light box</h2>
		<span class="closeLightbox">x</span>

		<div class="imgCon">
			<img src="images/user_images/drew_1553281065.png" alt="user poster" class="lbImg">
		</div>

	</section>

    <script src="js/nav.js"></script>
    <script src="js/lightbox.js"></script>
</body>
</html>