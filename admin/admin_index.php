<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	require_once('scripts/config.php');
	confirm_logged_in();

	// retrieve 24hour Time
	$i = date("H");
	// load message
	if ($i < 10) {
		$x = 'Good morning ';
		echo "<main class='night'>";
	} elseif ($i > 10 && $i < 17) {
		$x = 'Good afternoon ';
		echo "<main class='afternoon'>";
	} else {
		$x = 'Good evening ';
		echo "<main class='night'>";
	}


	$submissions = get_pre_images();



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
		<h2>
			<?php
			// greet user with time appropriate message
			echo $x.ucwords($_SESSION['user_name']).'!';

			?>
		</h2>


	<?php while ($row = $submissions->fetch(PDO::FETCH_ASSOC)): ?>

		<div class="poster">
			<img src="../images/user_images/<?php echo $row['file_name']; ?>" alt="">
			<br><br>
			
			<form action="admin_index.php" method="post">
				<input type="submit" name="yes_<?php echo $row['id']; ?>" value="Approve">
				<br><br>
				<input type="submit" name="no_<?php echo $row['id']; ?>" value="Decline">
				<br><br>
				<input type="submit" name="delete_<?php echo $row['id']; ?>" value="DELETE FROM SERVER">
				<br><br>
			</form>
		</div>

	<?php 

		$id = $row['id'];
		$file = $row['file_name'];
		$yes_post = 'yes_'.$id;
		$no_post = 'no_'.$id;
		$delete_post = 'delete_'.$id;

		// they've clicked approve
		if (isset($_POST[$yes_post])) {
			echo approve_image($id, $file);
		}

		// they've clicked decline
		if (isset($_POST[$no_post])) {
			echo decline_image($id, $file);
		}

		// they've clicked delete
		if (isset($_POST[$delete_post])) {
			echo delete_image($id, $file);
		}

		endwhile;	
	?>

		<a href="admin_createuser.php">Create Moderator</a>
		<a href="admin_edituser.php">Edit Moderator</a>
		<a href="scripts/caller.php?caller_id=logout">Sign Out</a>
	</main>

</body>

</html>






