<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $page_title ?></title>
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/signin.css" rel="stylesheet">

	</head>
	<body>
    <div class="container">
	<?= validation_errors() ?>
      <form class="form-signin" method="post" action="<?= current_url() ?>">
        <h2 class="form-signin-heading"><?= $page_title ?></h2>
        <label for="inputEmail" class="sr-only">Adresse E-mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Adresse E-mail" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required>
        
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="S'authentifier" name="login">
      </form>

    </div>
	</body>
</html>
