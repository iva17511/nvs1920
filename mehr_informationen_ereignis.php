<?php

$datum = (isset ($_POST['datum'])) ? $_POST['datum'] : date("Y-m-d");

include_once 'dbConfig.php';
global $db;

/** delete button was pressed */
if(isset($_POST['delete']) && isset($_POST['deleteId'])){
    mysqli_query($db, "delete from `ereignisse` where ID = ".$_POST['deleteId']);
    $msg = "<div class='alert alert-success'>Erfolgreich gelöscht!</div>";
}

$day = date('d', strtotime($datum));
$month = date('m', strtotime($datum));
$year = date('Y', strtotime($datum));

/** get all events from this day */
if(!$stmt = $db->prepare("select * from `ereignisse` where DAY(Datum) = ? AND MONTH(Datum) = ? AND YEAR(Datum) = ?")) {
    $error = $db->errno . ' ' . $db->error;
    echo $error;
}
$events=array();
$stmt->bind_param('sss', $day, $month, $year);
if($stmt->execute()){
    $result = $stmt->get_result();
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $events[] = $row;
        }
        $stmt->close();
    }
}

$info="";
/** output all events from this day */
foreach($events as $e){
    $info.='<br>';
    $info.='<div class="form-group"><label for="">Name</label><br><span '.(($e['Wichtigkeit'] == 0) ? "" : 'style="color:red;"').'>'.$e['Titel'].'</span></div>';
    $info.='<div class="form-group"><label for="">Beschreibung</label><br>'.(!empty($e['Beschreibung']) ? $e['Beschreibung'] : "-").'</div>';
    $info.='<form method="post"><input type="hidden" name="datum" value="'.$datum.'"><input type="hidden" name="deleteId" value="'.$e['ID'].'"> <button class="btn btn-danger btn-xs" type="submit" name="delete">Löschen</button></form>';
}

if(isset($_POST['back'])){
    header("Location: index.php?month=$month&year=$year");
}

?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mehr Informationen</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div class="container">
    <h1 class="text-center"><?php echo "Mehr Informationen zu den Ereignissen am ".date("j.n.Y",strtotime($datum)); ?></h1><hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo isset($msg)?$msg:''; ?>
            <form action="" method="post" autocomplete="off">
                <span>Roter Name = als wichtig markiert</span>
                <br>
                <?php echo $info; ?>
                <br>
                <form method="post"> <input type="hidden" name="datum" value="<?php echo $datum; ?>"> <button class="btn btn-primary" type="submit" name="back">Zurück</button> </form>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>