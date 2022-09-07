<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

$logFilez = "logFiles/logfile.txt";

$textStream = fopen($logFilez, 'a') or die ("can't open file.");

fwrite($textStream, $_SERVER['REMOTE_ADDR']);
fwrite($textStream, chr(9));
fwrite($textStream, date("Y-m-d"));
fwrite($textStream, chr(9));
//fwrite(textStream, date("h:i:s A"));
fwrite($textStream, chr(9));
//fwrite($textStream, $userID);
fwrite($textStream, chr(9));
//fwrite($textStream, $password);
fwrite($textStream, chr(9));

$fullDate = date("Y-m-d H:i:s");

	// connect to database
	$db = mysqli_connect('localhost', 'cgt356web1l', 'Acoustic1l3233', 'cgt356web1l');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users123 (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users123 WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
              
              fwrite($textStream, "Authenticated");
    fwrite($textStream, chr(9));
    fwrite($textStream, $_SERVER['HTTP_HOST']);
    fwrite($textStream, chr(9));
    fwrite($textStream, $_SERVER['HTTP_USER_AGENT']);
	fwrite($textStream, chr(9));
    fwrite($textStream, "\r\n");
  
    fclose($textStream);
  
    $select = "INSERT INTO LoggingLab9 (IPAddress, DateAndTime, AttemptedUserID, LoginSuccess, HttpHost, HttpUserAgent) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$fullDate."', '".$_SESSION['username']."', 'Authenticated', '".$_SERVER['HTTP_HOST']."', '".$_SERVER['HTTP_USER_AGENT']."')";
  
   mysqli_query($db, $select);
    
	CleanUp();
              
				header('location: index.php');
			}else {
              
               fwrite($textStream, "Bad Login");
    fwrite($textStream, chr(9));
    fwrite($textStream, $_SERVER['HTTP_HOST']);
    fwrite($textStream, chr(9));
    fwrite($textStream, $_SERVER['HTTP_USER_AGENT']);
	fwrite($textStream, chr(9));
    fwrite($textStream, "\r\n");
  
    fclose($textStream);
  
    $sql = "INSERT INTO LoggingLab9 (IPAddress, DateAndTime, AttemptedUserID, LoginSuccess, HttpHost, HttpUserAgent) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$fullDate."', '".$username."', 'Bad Login', '".$_SERVER['HTTP_HOST']."', '".$_SERVER['HTTP_USER_AGENT']."')";
  
   mysqli_query($db, $sql);
    

	CleanUp();
              
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

function CleanUp()
{
	//close connection to the database
	

	$username      = "";
	$password    = "";
	$sql         = "";
	$results      = "";
  $errors      = "";
	$num_records = "";
}
?>