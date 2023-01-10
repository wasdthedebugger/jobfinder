<?php

require_once("adminpanel.php");

require("conn.php");

$id = $_GET['id'];

$query = "UPDATE jobs SET status = \"public\" where id = $id;";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Job Archived";
} else {
    echo "Error";
}

header("Location: adminpanel.php");