<html>
<head>
    <title>Kalender</title>
    <link href="calendar.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<?php
setlocale(LC_TIME, "de_DE");
include 'calendar.php';
include 'dbConfig.php';

$calendar = new Calendar();
echo $calendar->show();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>