<?php

    $conn = mysqli_connect('localhost', 'trishten', 'test1234', 'awesome_pizza');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>