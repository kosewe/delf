<?php 

include 'delfMain.php';

$request = (object) $_POST;

$t = new delfMain();
$inst_id = $t->createInstitution($request);

$user_id = $t->createUser($request,$inst_id);

if(isset($inst_id) and isset($user_id)){
	echo 'Institution added successfully';
}else{
	echo 'Error 001: Error while adding Institution';
}