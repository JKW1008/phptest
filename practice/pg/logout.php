<?php
    include '../inc/dbconfig.php';
    include '../inc/memeber.php';

    $mem = new Member($db);

    $mem->logout();
?>