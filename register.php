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
<body class="sininen">

<fieldset>
    <form action="confirm.php" method="post">

    <input type="text" name="data[username]" placeholder="Käyttäjätunnus" required>
    <br>
    <input type="email" name="data[email]" placeholder="Sähköposti" required>
    <br>
    <input type="password" name="data[pwd]" placeholder="Salasana" required>
    <br>
    <input type="submit" value="Tallenna">
</form>
</fieldset>

<script src="js/main.js"></script>
</body>
</html>
