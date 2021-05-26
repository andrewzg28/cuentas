<?php
    $servername = "sql199.main-hosting.eu";
    $database = "u809517875_cuentasamg";
    $username = "u809517875_cuentasamg";
    $password = "Nocode2895";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        //echo "Connected successfully";
    ?>