<?php
//create a connection to your database
$link = mysqli_connect("localhost", "yoda", "12345", "is4460");
echo (!$link?die("connection failed"):"");
?>