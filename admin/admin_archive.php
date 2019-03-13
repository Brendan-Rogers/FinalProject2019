<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	require_once('scripts/config.php');
	confirm_logged_in();

	$display = get_images('declined');
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

	<h2>Welcome to the Archive, <?php echo ucwords($_SESSION['user_name']); ?></h2>
	<h3>Choose to either move images to accepted, or fully delete them from the server.</h3>


	<?php while ($row = $display->fetch(PDO::FETCH_ASSOC)): ?>

		<div class="orgPoster">
			<img src="../images/user_images/<?php echo $row['file_name']; ?>" alt="">
			<br><br>
			
			<form action="admin_archive.php" method="post">
				<input type="submit" name="yes_<?php echo $row['id']; ?>" value="Approve">
				<br><br>
				<input type="submit" name="delete_<?php echo $row['id']; ?>" value="Fully Decline (DELETE)">
				<br><br>
			</form>
		</div>

	<?php 

		$id = $row['id'];
		$file = $row['file_name'];
		$yes_post = 'yes_'.$id;
		$delete_post = 'delete_'.$id;

		// they've clicked approve
		if (isset($_POST[$yes_post])) {
			echo image_status($id, $file, '1');
		}

		// they've clicked delete
		if (isset($_POST[$delete_post])) {
			echo delete_image($id, $file);
		}

		endwhile;	
	?>
	
		<a href="admin_index.php">INDEX</a>
		<a href="admin_approved.php">ACCEPTED GALLERY</a>
		<br>
		<a href="admin_createuser.php">Create Moderator</a>
		<a href="admin_edituser.php">Edit Moderator</a>
		<a href="scripts/caller.php?caller_id=logout">Sign Out</a>
	</main>

</body>

</html>






