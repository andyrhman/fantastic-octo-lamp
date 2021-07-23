<?php

$hasil_per_halaman= 6;

$sql = "SELECT * FROM posts LIMIT 0,1000000000"; 
$result = mysqli_query($conn,$sql);
$hasil = mysqli_num_rows($result);

// while ($row = mysqli_fetch_array($result)){
//     echo $row['id'] . ' ' . $row['title'] . '<br>';
// }

$number_f_pages = ceil($hasil/$hasil_per_halaman);

if (!isset($_GET['page'])) {
    $page= 1;
} else {
    $page = $_GET['page'];
}

$hasil_pertama_halaman_ini = ($page-1)*$hasil_per_halaman;

$sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY p.created_at DESC LIMIT " . $hasil_pertama_halaman_ini . ',' . $hasil_per_halaman;
$result = mysqli_query($conn,$sql);

// while ($row = mysqli_fetch_array($result)) {
//     echo $row['id'] . ' ' . $row['title'] . '<br>';
// }

// for ($page=1; $page <= $number_f_pages ; $page++) { 
//     echo '<a href="home?page=' . $page . '">' . $page . '</a>';
// }

