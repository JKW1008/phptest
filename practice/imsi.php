<?php
    $email = 'ddd@dddd.com';

    $rs = filter_var($email, FILTER_VALIDATE_EMAIL);

    echo var_dump($rs);
?>