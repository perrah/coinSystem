<?php
/*include('init.php');
include(ROOT_PATH . '/application/services/database.php');

$db = new Database();
$db->connect();

$result = $db->query('select * FROM personal');
$array = mysqli_fetch_all($result['result']);

foreach($array as $rec) {
	echo $rec[0];
	echo " ";
	echo $rec[1];
	echo " ";
	echo $rec[2];
	echo " ";
	echo $rec[3];
	echo " ";
	echo $rec[4];
	echo " ";
	echo $rec[5];
	echo " ";
	echo $rec[6];
	echo " ";
	echo $rec[7];
	echo " ";
	echo $rec[8];
	echo "<br/>";
}
//var_dump($array);*/



//$sModel = new StoryModel();
//$rec = $sModel->getStoryByID(1);
/*
$sList = $sModel->getStoryList();
foreach($sList as $rec) {*/
/*echo $rec->getStoryID();
	echo " ";
	echo $rec->getSubSSO();
	echo " ";
	echo $rec->getTargetSSO();
	echo " ";
	echo $rec->getStory();
	echo " ";
	echo $rec->getSubDate();
	echo " ";
	echo $rec->getApvDate();
	echo " ";
	echo $rec->getStatus();
	echo " ";
	echo $rec->getValue1();
	echo " ";
	echo $rec->getValue2();
	echo " ";
	echo $rec->getValue3();
	echo "<br/>";*/
//}
// User List Test
include('init.php');
include(ROOT_PATH . '/application/userModel.php');
$uModel = new userModel();
$rec = $uModel->deleteUser(111001078);
//foreach($uList as $rec) {
		//echo " ";
	/*echo $rec->getSSO();
	echo " ";
	echo $rec->getLName();
	echo " ";
	echo $rec->getFName();
	echo " ";
	echo $rec->getCountry();
	echo " ";
	echo $rec->getBusiness();
	echo " ";
	echo $rec->getEmail();
	echo " ";
	echo $rec->getRoleOrRotation();
	echo " ";
	echo $rec->getPermissions();
	echo " ";
	echo $rec->getAdmin();
	echo " ";
	echo $rec->getPassword();
	echo "<br/>";*/
//}

//$uModel->createUser("111001078","Smith","Joe","USA","Lighting","Joe.Smith@ge.com", "1st","1","0","password");
/*if($success) {
	echo "Status Update Successful";
} else {
	echo "Status Update Failed";
}*/


//}
	
?>