<?php
header("Content-type: text/html; charset=utf-8");


//CURD DATABASE

function connect()
{
    $hostdb = "localhost:3306";
    $userdb = "root";
    $passdb = "";
    $dbconn = "pjnhomdb";
    $conn = mysqli_connect($hostdb, $userdb, $passdb, $dbconn);
    if (!$conn) {
        die('Không thể kết nối' . mysqli_connect_error());
        exit;
    }
    return $conn;
}

$conn = connect();

//insert, delete, update
function execute($sql)
{
    $conn = connect();
    mysqli_set_charset($conn, 'UTF8');
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

//select
function executeResult($sql)
{
    $conn = connect();
    mysqli_set_charset($conn, 'UTF8');
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (empty($result)) {
        printf("Error: %s\n", mysqli_error($conn));
    }
    while ($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}
