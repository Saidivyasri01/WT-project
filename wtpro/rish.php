<html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
</head>
<style>
  .form {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #ffffff;
}
.body{
  background-color: #ADD8E6;
}

.form h1 {
  text-align: center;
  margin-bottom: 20px;
}

.form input[type="text"],
.form input[type="email"],
.form input[type="password"],
.form input[type="submit"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box; /* Ensure padding and border are included in element's total width */
}

.form input[type="submit"] {
  background-color: #Ffc0cb;
  color: white;
  cursor: pointer;
}

.form input[type="submit"]:hover {
  background-color: #E6E6FA;
}
</style>







<body>
<?php
require('login.php');
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "INSERT into `login` (username, password, email)
VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='form.html'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
