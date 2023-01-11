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


    <form action="#" target="#" method="get" id="form">
        <input type="text" name="location" placeholder="Location Here" id="locationInput">
        <input type="submit" value="Search">
</form>
<br>
<div class="notice">ADMIN PANEL</div>
<br>

<div id="main">

    <?php

    $posts_query = "SELECT * FROM jobs";
    if (isset($_GET['location'])) {

        $posts_query = "SELECT * FROM jobs WHERE location = '" . $_GET['location'] . "'";
    }

    displayJobs($posts_query, $conn);

    function displayJobs($posts_query, $conn)
    {
        $posts_result = mysqli_query($conn, $posts_query);

        //taking response as an array and running a loop untill all posts come in
        while ($data_row = mysqli_fetch_array($posts_result)) {
            // echoing html format 
    ?>

            <div class="jobCard">
                <div class="jobTitle">
                    <h2><?php echo strtoupper($data_row['jobname']); ?></h2>
                </div>
                <div class="category">
                    <h4>Category: <?php echo $data_row['category']; ?></h4>
                </div>
                <div class="location">
                <h4><?php echo $data_row['location']; ?></h4>
                </div>
                <div class="jobDesc">
                    Description: <p><?php echo $data_row['jobdescription']; ?></p>
                </div>
                <div class="status">
                   Status: <?php echo $data_row['status']; ?>
                </div><br>
                <div class="actions">
                    <?php
                    if ($data_row['status'] == "public") {
                    ?>
                        <a href="archive.php?id=<?php echo $data_row['id']; ?>"><button class="btn btn-secondary">Archive</button></a>
                    <?php
                    } else {
                    ?>
                        <a href="unarchive.php?id=<?php echo $data_row['id']; ?>"><button class="btn btn-primary">Unarchive</button></a>
                    <?php
                    }
                    ?>
                    <a href="delete.php?id=<?php echo $data_row['id']; ?>"><button class="btn btn-danger">Delete</button></a>

                </div>
            </div><br>

            <?php

}
}
?>
</div>





    <?php require("footer.php"); ?>


</body>

</html>