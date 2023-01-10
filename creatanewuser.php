<?php

require_once("adminpanel.php");

require("conn.php");

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$query = "UPDATE jobs SET status = \"archived\" where id = $id;";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Job Archived";
} else {
    echo "Error";
}

header("Location: adminpanel.php");