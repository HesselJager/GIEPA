<?php

	include 'functions.php';
	$error = "";
	if(isset($_POST['submit'])) {
		$var = (verify_login($_POST['username'], $_POST['password']) == True);
		if($var == True){
			session_start();
			$_SESSION['logged_in'] = true;
			header("location: home.php");
		}
		if($var == False){
			$error = "You've entered the wrong credentials, please try again.";
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Giepa weather solution</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta name="theme-color" content="#563d7c">


    <style>
    	html,

body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}

.form-signin .form-control:focus {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.form-signin input[type="submit"] {
  background-color: #184893;
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  box-shadow: 0 10px 16px 0 rgba(0,0,0,0.24);
  -webkit-transition-duration: 0.2s; /* Safari */
  transition-duration: 0.2s;
}

.form-signin input[type="submit"]:hover {
  background-color: #DC292A;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="https://www.giepa.gm/sites/default/files/logo-giepa.png" alt="" style="width: 80%;">

      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="inputEmail" class="sr-only">Username</label>

      <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>

      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

		<h6 class="h6 mb-6 font-weight-normal"><font color="red"><?php echo $error; ?></font></h6>
	  
      <div class="checkbox mb-3"></div>

      <input type='submit' value="Sign in" name="submit" class="btn btn-lg btn-primary btn-block" type="submit">

      <p class="mt-5 mb-3 text-muted">&copy; Copyright <?php echo date("Y"); ?></p>
    </form>
  </body>
</html>
<?php 
	
?>