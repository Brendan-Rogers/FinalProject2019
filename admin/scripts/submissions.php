<?php 


function image_submit($f_name, $l_name, $email, $file) {

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

function image_status($id, $file, $status) {

	include('connect.php');

	// 1 - add status
	// 		0 = NEW
	// 		1 = APPROVED
	//		2 = DECLINED

	$approve_image_query = "UPDATE tbl_pre_images SET img_status = :status WHERE id = :id";
	$approve_image_set = $pdo->prepare($approve_image_query);
	$approve_image_set->execute(
		array(
			':id' => $id,
			':status' => $status 
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

}

function image_delete($id, $file) {

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

	if ($delete_image_set) {
		return 'Image '.$file.' has been deleted.<br>';
	} else {
		return 'Error deleting image';
	}
	
}

function get_images($x) {

	include('connect.php');

	switch ($x) {
		case 'new':
			$status = 0;
			break;
		
		case 'approved':
			$status = 1;
			break;

		case 'declined':
			$status = 2;
			break;

		default:
			return 'This function requires a parameter';
			break;
	}

	$get_images_query = "SELECT id, file_name, upload_time FROM tbl_pre_images WHERE img_status = {$status}";
	$get_images_set = $pdo->query($get_images_query);

	if ($get_images_set) {
		return $get_images_set;
	} else {
		return 'There are no more pre-approval submissions.';
	}


}


?>









