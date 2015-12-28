<?php
  include 'config.php';
  error_reporting(0);

	if(isset($_SESSION['user'])!="")
	{
 		header("Location: accueil.php");
	}

	if(isset($_POST['pushed_btn']))
	{
 		$email = $_POST['h_email'];
 		
 		$query = $bdd->prepare("SELECT email, pseudo FROM membres WHERE email='$email'");
    $query->execute();
    $query->bindValue(':email', $email);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($email != $row['email'])
    {
      $pseudo = $_POST['h_pseudo'];

      $query = $bdd->prepare("SELECT email, pseudo FROM membres WHERE pseudo='$pseudo'");
      $query->execute();
      $query->bindValue(':pseudo', $pseudo);
      $row = $query->fetch(PDO::FETCH_ASSOC);

    	if ($pseudo != $row['pseudo'])
      {
        $password1 = $_POST['password_1'];
        $password2 = $_POST['password_2'];
        if ($password1 == $password2)
        {
          unset($password2);
          $crypted_password = sha1($password1);
          unset($password1);
          $query = $bdd->query("INSERT INTO membres(email, pseudo, password) VALUES ('$email', '$pseudo', '$crypted_password')");
          header('Refresh:5; url=index.php');
          $messages = '<div class="alert alert-success" role="alert">Vous etes enregister, vous allez etre automatiquement rediriger sur la page de login.</div>';
        }
        else
        {
          $messages = '<div class="alert alert-danger" role="alert">Les passwords ne sont pas identiques.</div>';
          header("Refresh:3");
        }
      }
      else
      {
        $messages = '<div class="alert alert-danger" role="alert">Pseudo déjà utilisé</div>';
        header("Refresh:3");
      }
    }
    else
    {
    	$messages = '<div class="alert alert-danger" role="alert">Adresse e-mail déjà utilisée</div>';
    	header("Refresh:3");
    }
 	}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Register</title>
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
          <h1 class="text-center">Register</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email" name="h_email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Pseudo" name="h_pseudo">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password_1">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password confirmation" name="password_2">
            </div>
            <?php echo $messages; ?>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" name="pushed_btn">Sign Up</button>
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