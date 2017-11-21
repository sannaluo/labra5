<?php
session_start();
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
<body class="punainen">

<fieldset>
    <form method="POST" action="loginConfirm.php">
        <label>Käyttäjätunnus: <input type="text" name='username'></label><br>
        <label>Salasana: <input type="password" name='pwd'></label><br>
        <input type="submit" name="loginButton" id="loginButton" value="Sisään">
    </form>
</fieldset>

<script src="js/main.js"></script>
</body>
</html>

