<?php

class DbOperations
{

	private $con;

	function __construct()
	{
		require_once dirname(__FILE__) . '/DbConnect.php';
		$db = new DbConnect();
		$this->con = $db->connect();
	}


	public function createUser($email, $password, $confirmPassword)
	{


		//first of all check if account is already registered or not
		$query = "SELECT * FROM table_new WHERE email LIKE '$email'";
		$res = mysqli_query($db, $query);
		$count = mysqli_num_rows($res);

		if ($count == 1) {
			//account exists
			//echo json_encode('Error');
			return 0;
		}


		// if(this->isUserExist($email)){
		// return 0;
		// }


		else {
			$password = md5($password);
			$confirmPassword = md5($confirmPassword);
			$stmt = $this->con->prepare("INSERT INTO table_new (email, password, confirmPassword) VALUES (?,?,?);");
			$stmt->bind_param("sss", $email, $password, $confirmPassword);

			if ($stmt->execute()) {
				return 1;
			} else {
				return 2;
			}
		}
	}
	private function isUserExist($email)
	{
	$stmt= this->con->prepare("SELECT id FROM table_new WHERE email=? ");
	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows > 0;
	}

}
?>




/*-----------------------------------------debasish----------------------------------------------------------

class DbOperations
{

private $con;

function __construct()
{
require_once dirname(_FILE_) . '/DbConnect.php';
$db = new DbConnect();
$this->con = $db->connect();
}

public function createUser($email, $password, $confirmPassword)
{


//first of all check if account is already registered or not
$query = "SELECT * FROM table_new WHERE email LIKE '$email'";
$res = mysqli_query($db, $query);
$count = mysqli_num_rows($res);

if ($count == 1) {
//account exists
//echo json_encode('Error');
return 0;
}


// if(this->isUserExist($email)){
// return 0;
// }


else {
$password = md5($password);
$confirmPassword = md5($confirmPassword);
$stmt = $this->con->prepare("INSERT INTO table_new (email, password, confirmPassword) VALUES (?,?,?);");
$stmt->bind_param("sss", $email, $password, $confirmPassword);

if ($stmt->execute()) {
return 1;
} else {
return 2;
}
}
}
/*private function isUserExist($email)
{
$stmt= this->con->prepare("SELECT id FROM table_new WHERE email=? ");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->store_result();
return $stmt->num_rows > 0;
}*/
}

*/



/*-------------------------mee file-------------------------------------------------------------------------------------

class DbOperations
{

private $con;

function __construct()
{
require_once dirname(__FILE__) . '/DbConnect.php';
$db = new DbConnect();
$this->con = $db->connect();
}

function createUser($email, $password, $confirmPassword)
{
$password = md5($password);
$confirmPassword = md5($confirmPassword);
$stmt = $this->con->prepare("INSERT INTO `table_new` (`email`, `password`, `confirmPassword`) VALUES (?,?,?);");
$stmt->bind_param("sss", $email, $password, $confirmPassword);

if ($stmt->execute()) {
return true;
} else {
return false;
}
}
}