<?php
session_start();
$monat = (isset ($_SESSION['monat'])) ? $_SESSION['monat'] : (isset ($_POST['monat'])) ? $_POST['monat'] : date("m");
$jahr = (isset ($_SESSION['jahr'])) ? $_SESSION['jahr'] : (isset ($_POST['jahr'])) ? $_POST['jahr'] : date("Y");

if (!isset($_SESSION['monat']))
    $_SESSION['monat']=$monat;

if (!isset($_SESSION['jahr']))
    $_SESSION['jahr']=$jahr;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $datum = $_POST['datum'];
    $wichtig = isset($_POST['wichtig']) ? $_POST['wichtig'] : 0;
    $beschreibung = $_POST['beschreibung'];
    if(empty($name) || empty($datum) || !DateTime::createFromFormat('Y-m-d', $datum))
        $fehler = "Name und Datum müssen gesetzt sein";
    else {
        $mysqli = new mysqli('localhost', 'root', '', 'kalenderanwendung');
        $stmt = $mysqli->prepare("INSERT INTO ereignisse (Titel, Datum, Wichtigkeit, Beschreibung) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $name, $datum, $wichtig, $beschreibung);
        $stmt->execute();
        $msg = "<div class='alert alert-success'>Erfolgreich erstellt!</div>";
        $stmt->close();
        $mysqli->close();
    }
}

if(isset($_POST['back'])){
    header("Location: index.php?month=$monat&year=$jahr");
}

?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Neues Ereignis erstellen</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="container">
    <h1 class="text-center">Erstelle neues Ereignis</h1><hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo isset($msg)?$msg:''; ?>
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="">Name</label>
                    <br>
                    <label>
                        <input type="text" class="form-control" name="name">
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Datum</label>
                    <br>
                    <input type="date" name="datum" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Als wichtig markieren</label>
                    <br>
                    <input type="checkbox" name="wichtig" value="1">
                </div>
                <div class="form-group">
                    <label for="">Beschreibung</label>
                    <input type="text" class="form-control" name="beschreibung">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Erstellen</button>
                <form method="post"> <input type="hidden" name="monat" value="<?php echo $monat; ?>"><input type="hidden" name="jahr" value="<?php echo $jahr; ?>"> <button class="btn btn-primary" type="submit" name="back">Zurück</button> </form>
                <div class="form-group">
                    <br>
                    <label for="" id="fehler" class="fehler"><?php echo isset($fehler)?$fehler:''; ?></label>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
