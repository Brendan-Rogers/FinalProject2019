<?php 


function move_new_image($f_name, $l_name, $email, $file) {

	require_once('connect.php');

	$new_image_query = 'INSERT INTO tbl_pre_images (f_name, l_name, email, file_name) VALUES (:firstname, :lastname, :email, :file)';
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

function get_pre_images() {

	require_once('connect.php');

	$get_images_query = 'SELECT id, file_name, upload_time FROM tbl_pre_images WHERE img_status = 0';
	$get_images_set = $pdo->query($get_images_query);

	if ($get_images_set) {
		return $get_images_set;
	} else {
		return 'There are no more pre-approval submissions.';
	}

}

function approve_image($id, $file) {

	include('connect.php');

	// 1 - add approve image in tbl_pre_images (status = 1)

	$approve_image_query = "UPDATE tbl_pre_images SET img_status = 1 WHERE id = :id";
	$approve_image_set = $pdo->prepare($approve_image_query);
	$approve_image_set->execute(
		array(
			':id' => $id
		)
	);

	// 2 - add who approved to tbl_pre_images (moderator = $_SESSION['user_id'])

	$mod_approve_query = "UPDATE tbl_pre_images SET moderator = :moderator WHERE id = :id";
	$mod_approve_set = $pdo->prepare($mod_approve_query);
	$mod_approve_set->execute(
		array(
			':moderator'=>$_SESSION['user_id'],
			':id'=>$id
		)
	);

	// 3 - add image to tbl_post_images

	$send_image_query = "INSERT INTO tbl_post_images (file_name) VALUES (:file)";
	$send_image_set = $pdo->prepare($send_image_query);
	$send_image_set->execute(
		array(
			':file'=>$file
		)
	);

	// 4  - Return valuable deets

	return 'Picture '.$file.' has been APPROVED <br>';

}

function decline_image($id, $file) {

	include('connect.php');

	// 1 - decline image in tbl_pre_images (img_status = 2)

	$decline_image_query = "UPDATE tbl_pre_images SET img_status = 2 WHERE id = :id";
	$decline_image_set = $pdo->prepare($decline_image_query);
	$decline_image_set->execute(
		array(
			':id' => $id
		)
	);

	// 2 - add who declind image to tbl_pre_images (moderator = $_SESSION['user_id'])

	$mod_decline_query = "UPDATE tbl_pre_images SET moderator = :moderator WHERE id = :id";
	$mod_decline_set = $pdo->prepare($mod_decline_query);
	$mod_decline_set->execute(
		array(
			':moderator' => $_SESSION['user_id'],
			':id' => $id
		)
	);

	// 3 - Return salient info

	return 'Picture number '.$id.' has been DECLINED <br>';

}

function delete_image($id, $file) {

	include('connect.php');

	// 1 - Delete image

	$img_path = '../images/user_images/'.$file;
	unlink($img_path);

	// 2 - Delete from SQL database
	$delete_image_query = 'DELETE FROM tbl_pre_images WHERE id = :id';
	$delete_image_set = $pdo->prepare($delete_image_query);
	$delete_image_set->execute(
		array(
			':id' => $id
		)
	);



}


?>









