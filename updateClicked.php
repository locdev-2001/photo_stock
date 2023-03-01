<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    include('connectDatabase.php');

    $connect = openConn();

    $update = "UPDATE post SET CLICKED = CLICKED + 1 WHERE POSTID = " . $id;

    mysqli_query($connect, $update);
}
