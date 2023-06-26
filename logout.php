<?php

session_start();
session_unset();
session_destroy();
setcookie("TestCookie", "");
header("Location: index.php");
