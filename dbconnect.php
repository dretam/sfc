<?php
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost", "root", "", "sfc");

if (!$conn) {
    echo "Gagal koneksi database!";
} else {
};

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }
    return $record;
}
