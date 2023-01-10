<?php require("conn.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("links.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php require("header.php"); ?>


<form action="#" target="#" method="get">
        <input type="text" name="location" id="" placeholder="Location Here">
        <input type="submit" value="Search">
</form>

<br>

<?php

$posts_query = "SELECT * FROM jobs";
if(isset($_GET['location'])){

$posts_query = "SELECT * FROM jobs WHERE location = '".$_GET['location']."'";

}

displayJobs($posts_query, $conn);

function displayJobs($posts_query, $conn)
{
    $posts_result = mysqli_query($conn, $posts_query);

    //taking response as an array and running a loop untill all posts come in
    while ($data_row = mysqli_fetch_array($posts_result)) {
        // echoing html format 
        if ($data_row['status'] == "public") {
?>

            <div class="jobCard">
                <div class="jobTitle">
                    <h3><?php echo $data_row['jobname']; ?></h3>
                </div>
                <div class="category">
                    <h4><?php echo $data_row['category']; ?></h4>
                </div>
                <div class="location">
                    <h4><?php echo $data_row['location']; ?></h4>
                </div>
                <div class="jobDesc">
                    <p><?php echo $data_row['jobdescription']; ?></p>
                </div>
                <div class="actions">
                    <a href="archive.php?id=<?php echo $data_row['id']; ?>">Archive</a>
                    <a href="delete.php?id=<?php echo $data_row['id']; ?>">Delete</a>
                    <a href="delete.php?id=<?php echo $data_row['id']; ?>">Publicize</a>
                </div>
            </div>

<?php

        }
    }
}
?>

<br>





<?php require("footer.php"); ?>


</body>
</html>