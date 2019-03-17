<?php 


function image_submit($f_name, $l_name, $email, $file) {

	require_once('connect.php');

	$new_image_query = 'INSERT INTO tbl_images (f_name, l_name, email, file_name) VALUES (:firstname, :lastname, :email, :file)';
	$new_image_set = $pdo->prepare($new_image_query);
	$new_image_set->execute(
		array(
			':firstname' => $f_name,
			':lastname' => $l_name,
			':email' => $email,
			':file' => $file
		)
	);

	if ($new_image_set) {
		return 'Successfully inserted into table';
	} else {
		return 'Insert query failed';
	}

}

function image_status($id, $file, $status) {

	// img_status is only for DISPLAY IN GALLERY, not DISPLAY IN ADMIN

	// mod_approve and mod_decline are for DISPLAY IN ADMIN

	// img_status should only be updated from 0 to 1, indicating it's recieved enough approval to display
	// mod_approve and mod_decline are updated to display in admin panel and judge approval ratings

	include('connect.php');

	// 1 - add status
	// 		0 = NEW
	// 		1 = APPROVED
	//		2 = DECLINED

	if ($status == 1) {
		$x = 'mod_approve';
	} else if ($status == 2) {
		$x = 'mod_decline';
	}

	// SELECT mod_approve string WHERE id = id
	$mod_list_query = "SELECT {$x} FROM tbl_images WHERE id = {$id}";
	$mod_list_set = $pdo->query($mod_list_query);

	// fetch the row from our query
	$mod_array = $mod_list_set->fetch(PDO::FETCH_ASSOC);
	// mod_string is the column we ask for
	$mod_string = $mod_array[$x];

	// explode that string into an array
	$mods = explode(",", $mod_string);


	// the current user is not in $mods
	if (!in_array($_SESSION['user_id'], $mods)) {

		// insert the current user into mod_approve string
		$mod_string .= ','.$_SESSION['user_id'];

		// replace the old string with this updated string, featuring our mods decision
		$mod_update_query = "UPDATE tbl_images SET {$x} = '{$mod_string}' WHERE id = {$id}";
		$mod_update_set = $pdo->query($mod_update_query);
		
	} // if the current user is in the array, we shouldnt add them again

	if ($status == 1) {
		// query users' lastlogin times
		$lastlogin_query = "SELECT user_lastlogin FROM tbl_users";
		$lastlogin_set = $pdo->query($lastlogin_query);

		$active_users = 0;
		$today = time();
		while ($row = $lastlogin_set->fetch(PDO::FETCH_ASSOC)) {
			$lastlogin = strtotime($row['user_lastlogin']);
			$diff = $today - $lastlogin;
			if (round($diff / (60 * 60 * 24)) <= 7) {
				// having logged in within the past week makes you an active user
				$active_users += 1;
			}
		}

		// if more then half the active admins approve. This can be adjusted
		if (count($mods) >= ($active_users / 2)) {
			$approve_image_query = "UPDATE tbl_images SET img_status = :status WHERE id = :id";
			$approve_image_set = $pdo->prepare($approve_image_query);
			$approve_image_set->execute(
				array(
					':id' => $id,
					':status' => $status 
				)
			);

		} 
	} else {
		// if we're removing them from the gallery, we dont want a dead link. return that img_status to 0
		$approve_image_query = "UPDATE tbl_images SET img_status = :status WHERE id = :id";
		$approve_image_set = $pdo->prepare($approve_image_query);
		$approve_image_set->execute(
			array(
				':id' => $id,
				':status' => $status 
			)
		);
	}
}



function get_images($status) {

	include('connect.php');

	// $status
	// = 0 - NEW
	// = 1 - APPROVED
	// = 2 - ARCHIVED

	// TODO
	// make this work with mod_approve and mod_decline instead of img_status


	// 1 - explode both the strings into arrays

	// 2 - IF
	// $x = NEW
		// IF neither string contains $_SESSION['user_id']
			// return picture
	// $x = APPROVED
		// IF mod_approve contains $_SESSION['user_id'] && we're in admin_approved (this doesn't go for gallery.php)
			// return picture
	// $x = DECLINED
		// IF mod_decline contains $_SESSION['user_id']
			// return picture

	$get_images_query = "SELECT id, file_name, upload_time, mod_approve, mod_decline FROM tbl_images WHERE img_status = {$status}";
	$get_images_set = $pdo->query($get_images_query);

	if ($get_images_set) {
		return $get_images_set;
	} else {
		return 'There are no submissions.';
	}


}


function image_delete($id, $file) {

	include('connect.php');

	// 1 - Delete image

	$img_path = '../images/user_images/'.$file;
	unlink($img_path);

	// 2 - Delete from SQL database
	$delete_image_query = 'DELETE FROM tbl_images WHERE id = :id';
	$delete_image_set = $pdo->prepare($delete_image_query);
	$delete_image_set->execute(
		array(
			':id' => $id
		)
	);

	if ($delete_image_set) {
		return 'Image '.$file.' has been deleted.<br>';
	} else {
		return 'Error deleting image';
	}
	
}


?>

