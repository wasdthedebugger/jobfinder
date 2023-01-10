<?php
if (!(isset($_POST['password']))) {

?>
    <form action="#" target="#" method="POST">
        <input type="password" name="password" id="">
    </form>
    <?php

} else {
    $password = $_POST['password'];
    if ($password != 'letmein') {
        echo 'Wrong Password';
    } else {
    ?>


        <!-- This loads up only when the user enters the correct password, from here, admin panel can be accessed -->

        


<?php
    }
}
?>