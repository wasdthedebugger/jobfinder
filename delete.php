<?php

require_once("adminpanel.php");

require("conn.php");

$id = $_GET['id'];

$query = "DELETE ALL where id = $id;";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Deleted";
} else {
    echo "Error";
}

header("Location: adminpanel.php");