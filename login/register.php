<?php include('login_logic.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="header">
    <h2>Registrierung</h2>
</div>

<form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo (isset($name)?$name:""); ?>">
    </div>
    <div class="input-group">
        <label>E-Mail Adresse</label>
        <input type="email" name="email" value="<?php echo (isset($email)?$email:""); ?>">
    </div>
    <div class="input-group">
        <label>Passwort</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Passwort bestätigen</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-primary" name="reg_user">Registrieren</button>
    </div>
    <p>
        Bereits registriert? <a href="login.php">Einloggen</a>
    </p>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>