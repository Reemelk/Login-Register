<?php
  include 'config.php';
  error_reporting(0);

  if (isset($_POST['pushed_btn']))
  {
    $email_pseudo = $_POST['h_email'];
    $password = sha1($_POST['h_password']);

    $query = $bdd->prepare("SELECT * FROM membres WHERE (email='$email_pseudo' OR pseudo='$email_pseudo') AND password='$password'");
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ((($row['email'] == $email_pseudo) || ($row['pseudo'] == $email_pseudo)) && ($row['password'] == $password))
    {
      $_SESSION['pseudo'] = $row['pseudo'];
      header('location: accueil.php');
    }
    else 
    {
      $message = '<div class="alert alert-danger" role="alert">Mauvais information saisit, veuillez saisir une nouvelle fois.</div>';
      header('refresh:3');
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email" name="h_email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="h_password">
            </div>
            <?php echo $message; ?>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" name="pushed_btn">Sign In</button>
              <span class="pull-right"><a href="register.php">Register</a></span>
            </div>
          </form>
      </div>
     <div class="modal-footer"></div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>