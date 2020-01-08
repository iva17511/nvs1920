<?php include('login_logic.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>E-Mail Adresse</label>
        <input type="text" name="email" >
    </div>
    <div class="input-group">
        <label>Passwort</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
    </div>
    <p>
        Noch nicht registriert? <a href="register.php">Registrieren</a>
    </p>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>