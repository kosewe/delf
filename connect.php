<?php
 ini_set('display_errors', '1');
error_reporting(E_ALL);
if (isset($_POST["submit"])){
$hostname='localhost';
$username='testuser';
$password='Test123test!';

$school=$_POST['school'];
$address=$_POST['address'];
$email=$_POST['email'];
$pass2=$_POST['pass2'];


try {
$dbh = new PDO("mysql:host=$hostname;dbname=delf",$username,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	$stmt = $dbh->prepare("INSERT INTO school VALUES (null, :school, :address)");
$stmt->bindParam(':school', $school, PDO::PARAM_STR);
$stmt->bindParam(':address', $address, PDO::PARAM_STR);
$stmt->execute();
$id = $dbh->lastInsertId();
//print_r($id);
//echo 'test';
$stmt = $dbh->prepare("INSERT INTO users VALUES (null, :email, :pass2, :inst_id)");
//$id =lastInsertId();
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':pass2', $passwordHashed, PDO::PARAM_STR);
$stmt->bindParam(':inst_id',$id, PDO::PARAM_INT);
$passwordHashed = password_hash($pass2, PASSWORD_BCRYPT);
//echo $passwordHashed;
$result = $stmt->execute();

//print_r($result);
//print $dbh->lastInsertId();

// $stmt = $dbh->prepare("INSERT INTO users VALUES (:email, :pass2)");
// $stmt->bindParam(':email', $school);
// $stmt->bindParam(':pass2', $pass2);
// insert one row
// $school = 'school';
// $address = 'address';

// insert another row with different values
// $email = 'email';
// $pass2 = 'pass2';
// $stmt->execute();



// if ($dbh->query($sql)) {
// echo "<script type= 'text/javascript'>alert('school Registered Successfully');</script>";
// }
// else{
// echo "<script type= 'text/javascript'>alert('Schoo not successfully Registered');</script>";
// }

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}




}


	?>


	<?php

if (isset($_POST["login"])){
$hostname='localhost';
$username='testuser';
$password='Test123test!';


//The form values that the user has supplied us with.
$email = $_POST['email'];
$pass2 = $_POST['pass2'];
 try {
$sql = new PDO("mysql:host=$hostname;dbname=delf",$username,$password);
$sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
//Retrieve the table row for the given username.
$sql = "SELECT admin_id, email, password FROM users WHERE email = :email" ;
 
//Prepare your statement.
$stmt = $pdo->prepare($sql);
    
//Bind the username value.
$stmt->bindValue(':email', $email);
    
//Execute the statement.
$stmt->execute();
    
//Fetch the table row.
$email = $stmt->fetch(PDO::FETCH_ASSOC);
 
//If we retrieved a relevant record.
if($email !== false){
    //Compare the password attempt with the password we have stored.
    $validPassword = password_verify($passwordHashed, $email['pass2']);
    if($validPassword !== $passwordHashed){
        echo "All is good. Log the user in."
    }
}
$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();

}

}



































	}







	





	?>