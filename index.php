<!DOCTYPE html>
<html>
<head>
	<title>Delf |Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">          
    <link href="css/bootstrap.min.css"rel="stylesheet">
    <link href="css/main.css"rel="stylesheet">
    <!-- <link href="css/form.css"rel="stylesheet"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
         <div class="col-sm-4" style="position: absolute;width: 600px;height: 100px;">
         </div>
                <div class="col-sm-8 nav-container">
                <ul class="nav nav-pills">
                <li> <a href="home.html">Home</a></li>
                <li> <a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>
      <div class="mastfoot" style="position: absolute;margin-left: 600px; width: 200px; margin-top: 700px">
                <div class="inner">
                    <p><font color="black">Copyright &copy;</font> <a href="/">Wolf 2017</a></p>
                </div>
            </div>
            <?php
            $school = $address = $phone = $email = $pass1 = $pass2;
            $schoolErr = $addressErr= $phoneErr = $emailErr;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

              if (!isset($_POST["school"])) {

                 $school = test_input($_POST["school"]);
                }
                else
                {

                if (!preg_match("/^[a-zA-Z ]*$/",$school)) {
                 $schoolErr = "Only letters and white space allowed";
                 }

                }
                if (!isset($_POST["address"])) {

                 $address = test_input($_POST["address"]);
                }
                else
                {

                if (!preg_match("/^[a-zA-Z ]*$/",$address)) {
                 $addressErr = "Only letters and white space allowed";
                 }
                
                }
                

                 if (!isset($_POST["email"])) {

                 $emailErr = test_input($_POST["email"]);
                }
                else
                {

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $emailErr = "Invalid email format";
                 }
                
                }
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

            }
?>

<div style="height:40px;"></div>
    <div class="assessment-container container">
        <div class="row">
        <h2> Fill In The Fields</h2>
        <span class="error"></span>

            <form class="registration-form reg" method="post" action="createInstitution.php"> 
                <fieldset>
                    <!-- FirstName:<br /> -->
                    <input type="text" name="school" class="form-control" id="school" required="required" placeholder="School name" value="<?php echo $school;?>"/>
                    <span class="error"> <?php echo $schoolErr;?> </span>
                    <br />
                    <!-- LastName: <br /> -->
                    <input type="text" name="address" id="address" required="required" placeholder="School Address" value="<?php echo $address;?>"/>
                    <span class="error"> <?php echo $addressErr;?> </span>
                    </br>

                     Email:</br>
                      <input type="text" name="email" required="required" id="email" placeholder="johndoe1@email.com" value="<?php echo $email;?>" />
                       <span class="error"> <?php echo $emailErr;?> </span>
                      </br>
                       Password:</br>
                      <input type="password" name="pass1" required="required" id="pass1" />
                      </br>
                       Confirm passwod:</br>
                      <input type="password" name="pass2" required="required" id="pass2" />
                        </br>
                      <button class="btn btn-lg btn-primary btn-block" name="submit" value="submit" type="submit">Register</button>
                      </br>

                </fieldset>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript"  src="js/bootstrap.min.js"></script>
<script type="text/javascript"  src="js/main.js"></script>
</html>