<?php 

function redirect_to($location) {
	if($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}

function getSingle($tbl, $col, $id) {

	include('connect.php');

	$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
	$runSingle = $pdo->query($querySingle);
	
	if($runSingle){
		return $runSingle;
	}else{
		$error = "There was a problem accessing this information.  Sorry about your luck ;)";
		return $error;
	}
}

 ?>