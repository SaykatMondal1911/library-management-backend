<?php

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST['email']) and isset($_POST['password']) and isset($_POST['confirmPassword'])) {

		$db = new DbOperations();

		$result = $db->createUser($_POST['email'],$_POST['password'],$_POST['confirmPassword'] );

		if ($result == 1) {
			$response['error'] = false;
			$response['message'] = 'User registered successfully';
		}
		elseif($result == 2) {
			$response['error'] = true;
			$response['message'] = 'Some error occurred please try again';
		}
		elseif($result == 0) {
			$response['error'] = true;
			$response['message'] = 'Email already registered, Please use different Email and Username';
		} 


	} 

	else {
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
} 

else {

	$response['error'] = true;
	$response['message'] = "Invalids Request";

}

echo json_encode($response);


?>




/*   debasish file-------------------------------------------------------------------------------------

require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['email']) and isset($_POST['password']) and isset($_POST['confirmPassword'])) {

$db = new DbOperations();

$result = $db->createUser(
$_POST['email'],
$_POST['password'],
$_POST['confirmPassword']
);

if ($result == 1) {
$response['error'] = false;
$response['message'] = 'User registered successfully';
} 
else if ($result == 2) {
$response['error'] = true;
$response['message'] = 'Some error occurred please try again';
}
 else if ($result == 0) {
$response['error'] = true;
$response['message'] = 'Email already registered, Please use different Email and Username';
}
} else {
$response['error'] = true;
$response['message'] = "Required fields are missing";
}
} else {
$response['error'] = true;
$response['message'] = "Invalids Request";
}

echo json_encode($response);

*/






/* my file ---------------------------------------------------------------------------------------------------


require_once '../includes/DbOperations.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_POST['email']) and isset($_POST['password']) and isset($_POST['confirmPassword'])) {

		$db = new DbOperations();
		if ($db->createUser($_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {
			$response['error'] = false;
			$response['message'] = 'User registered successfully';
		} else {
			$response['error'] = true;
			$response['message'] = 'Some error occurred please try again';
		}
	} else {
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
} else {
	$response['error'] = true;
	$response['message'] = "Invalids Request";
}

echo json_encode($response);

