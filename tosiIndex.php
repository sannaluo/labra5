<?php
session_start();
echo 'jee';
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KORVIAHIVELEVÄ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="vihrea">
<?php
if($_SESSION['kirjautunut']=='yes'){
    echo '<div>';
    echo 'Käyttäjätunnus: '.$_SESSION['username'];
    echo '<br>';
    echo 'Sähköposti: '.$_SESSION['email'];
    echo '<br>';
    echo('<button><a href="logout.php">Kirjaudu ulos</a></button>');
    echo '</div>';
}

?>
</body>
</html>