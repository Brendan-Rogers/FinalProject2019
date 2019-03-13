<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	include('scripts/config.php');
	confirm_logged_in();

	$display = get_images('new');
?>

<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ADMINISTRATOR PANEL</title>
	<link rel="stylesheet" href="../css/main.css">
</head>

<body>
	<main>
		<h2> Welcome to the Mod Panel, <?php  echo ucwords($_SESSION['user_name']).'.';  ?> </h2>


	<?php while ($row = $display->fetch(PDO::FETCH_ASSOC)): ?>

		<div class="orgPoster">
			<img src="../images/user_images/<?php echo $row['file_name']; ?>" alt="">
			<br><br>
			
			<form action="admin_index.php" method="post">
				<input type="submit" name="yes_<?php echo $row['id']; ?>" value="Approve">
				<br><br>
				<input type="submit" name="no_<?php echo $row['id']; ?>" value="Decline">
				<br><br>
			</form>
		</div>

	<?php 

		$id = $row['id'];
		$file = $row['file_name'];
		$yes_post = 'yes_'.$id;
		$no_post = 'no_'.$id;

		// they've clicked approve
		if (isset($_POST[$yes_post])) {
			echo image_status($id, $file, '1');
		}

		// they've clicked decline
		if (isset($_POST[$no_post])) {
			echo image_status($id, $file, '2');
		}

		endwhile;	
	?>

		<a href="admin_archive.php">ARCHIVED</a>
		<a href="admin_approved.php">ACCEPTED GALLERY</a>
		<br>
		<a href="admin_createuser.php">Create Moderator</a>
		<a href="admin_edituser.php">Edit Moderator</a>
		<a href="scripts/caller.php?caller_id=logout">Sign Out</a>
	</main>

</body>

</html>






