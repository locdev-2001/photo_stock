<?php

function openConn()
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'wallpaper_website';

    $conn = new mysqli($host, $user, $password, $database) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
