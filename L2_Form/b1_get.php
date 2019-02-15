<?php
    $name = isset($_GET['name_1'])? $_GET['name_1'] : "";
    $email = isset($_GET['email_1'])? $_GET['email_1']: "";
    echo $name."<br>";
    echo $email."<br>";
?>