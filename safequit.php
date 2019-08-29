<?php
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
session_start();
session_unset();
session_destroy();
header("location:login.php");
?>