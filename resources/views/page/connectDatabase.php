<?php

function openConn()
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'wallpaper_website';

    $conn = new mysqli($host, $user, $password, $database);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
