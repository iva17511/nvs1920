<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
setlocale(LC_TIME, "de_DE");
include 'calendar.php';
include 'dbConfig.php';

$calendar = new Calendar();
echo $calendar->show();
?>
</body>
</html>