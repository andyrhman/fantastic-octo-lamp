<?php

include(ROOT_PATH . "/blog/app/database/db.php");
include(ROOT_PATH . "/blog/app/helpers/validateKategori.php");
include(ROOT_PATH . "/blog/app/helpers/middleware.php");

$table = 'kategori'; //kode serba guna

$errors = array();
$id = '';
$name = '';
$description = '';

$kategoris = selectAll($table);

if (isset($_POST['tambah-kategori'])) { // Ketika pengguna mengklik 
    adminOnly();
    $errors = validateKategori($_POST);

    if (count($errors) === 0) {
        unset($_POST['tambah-kategori']); // Menghilangkan 'tambah-kategori' saat di echo
        $topic_id = create($table, $_POST);
        $_SESSION['message'] = 'Kategori berhasi dibuat!';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/blog/admin/categories/index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }


}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kategorii = selectOne($table, ['id' => $id]);
    $id = $kategorii['id'];
    $name = $kategorii['name'];
    $description = $kategorii['description'];


}

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Kategori berhasil dihapus!';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/blog/admin/categories/index.php');
    exit();
}

if (isset($_POST['update-kategori'])) {
    adminOnly();
    $errors = validateKategori($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-kategori'], $_POST['id']);
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Kategori berhasil di-update!';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/blog/admin/categories/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}
