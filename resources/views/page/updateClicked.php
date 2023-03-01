<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    include('connectDatabase.php');

    $connect = openConn();

    $update = "UPDATE post SET CLICKED = CLICKED + 1 WHERE POSTID = '" . $id . "'";

    if (mysqli_query($connect, $update)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
    die;
}
