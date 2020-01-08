<?php
session_start();

// initializing variables
$name = "";
$email = "";
$errors = array();

include_once('../dbConfig.php');
global $db;

/** register */
if (isset($_POST['reg_user'])) {
    /** receive input from form */
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    /** validate input, error handling by pushing errormessage into array that will be put out in gui */
    if (empty($name)) array_push($errors, "Name wird erfordert");
    if (empty($email)) array_push($errors, "E-Mail Adresse wird erfordert");
    if (empty($password_1)) array_push($errors, "Passwort wird erfordert");
    else if (strlen($password_1)<6) array_push($errors, "Das Passwort muss mindestens 6 Zeichen enthalten");
    if ($password_1 != $password_2) array_push($errors, "Die Passwörter stimmen nicht überein!");

    /** check the database to make sure that the email doesnt already exist */
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user['email'] === $email) {
        array_push($errors, "Diese E-Mail Adresse ist bereits registriert");
    }

    /** register if no errors occured */
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO user (name, email, password) VALUES('$name', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header('location: ../index.php');
    }
}

/** Login */
if (isset($_POST['login_user'])) {
    /** receive input from form */
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    /** validate input, error handling by pushing errormessage into array that will be put out in gui */
    if (empty($email))
        array_push($errors, "E-Mail wird erfordert");
    if (empty($password))
        array_push($errors, "Passwort wird erfordert");

    /** login if no errors occured */
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT name FROM user WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = $results->fetch_row();
            $_SESSION['name'] = $row[0];
            $_SESSION['email'] = $email;
            header('location: ../index.php');
        }else {
            array_push($errors, "E-Mail Adresse/Passwort falsch");
        }
    }
}
?>