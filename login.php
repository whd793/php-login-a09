<?php include('server.php');
  
  

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 07 - Login</title>
	<meta charset="utf-8" />
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#info {position:absolute; top:60px; left:20px; width:460px; }
		fieldset#submit {position:absolute; top:200px; left:20px; width:460px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg {color:#ff0000; font-weight:bold; font-size:12pt; position:absolute; top:300px; left:25px;}
		div#newLogin {color:#0000ff; font-size:12pt; position:absolute; top:350px; left:25px;}
	</style>
</head>
<body>

	
	
  <h1 style="font-size:14pt; text-indent:360px;">Lab 09 - Login</h1>

<form id="form0" method="post" action="login.php"> 
    <fieldset id="info">
        <legend>Login</legend>
        <ul>
         <li>   <label>Username</label>
			<input type="text" name="username" >
          </li>
          <li>
          <label>Password</label>
			<input type="password" name="password">
          </li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <button type="submit" class="btn" name="login_user">Login</button>
    <a href="register.php">  Register</a>

    </fieldset>
</form>
  
  
	


</body>
</html>