<?php

$datum = (isset ($_POST['datum'])) ? $_POST['datum'] : date("Y-m-d");

$day = date('d', strtotime($datum));
$month = date('m', strtotime($datum));
$year = date('Y', strtotime($datum));

/** get information from db */
include_once 'dbConfig.php';
global $db;

$result = mysqli_query($db, "select * from `feiertage` where DAY(Datum) = $day AND MONTH(Datum) = $month AND YEAR(Datum) = $year");
$holidays = mysqli_fetch_array($result);

if(isset($_POST['back'])){
    header("Location: index.php?month=$month&year=$year");
}

?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mehr Informationen</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="container">
    <h1 class="text-center"><?php echo "Mehr Informationen zum Feiertag am ".date("j.n.Y",strtotime($datum)); ?></h1><hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="">Name</label>
                    <br><?php echo $holidays['Name']?>
                </div>
                <div class="form-group">
                    <label for="">Beschreibung</label>
                    <br><?php echo $holidays['Beschreibung']?>
                </div>
                <form method="post"> <input type="hidden" name="datum" value="<?php echo $datum; ?>"> <button class="btn btn-primary" type="submit" name="back">Zurück</button> </form>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>