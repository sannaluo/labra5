<?php

session_start();
require_once 'config/config.php';
echo 'jeejee';
session_destroy();

redirect('index.php');
?>