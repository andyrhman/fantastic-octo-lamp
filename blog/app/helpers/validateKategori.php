<?php

function validateKategori($kategori)
{
    $errors = array();

    // count(array($errors));

    if (empty($kategori['name'])) {
        array_push($errors, 'Nama diperlukan!');
    }

    // $existingKategori = selectOne('kategori', ['name' => $kategori['name']]);
    // if ($existingKategori) {
    //     array_push($errors, 'Nama sudah ada!');
    // }

    $existingKategori = selectOne('kategori', ['name' => $kategori['name']]);
    if ($existingKategori) {

        if (isset($kategori['update-kateori']) && $existingKategori['id'] != $kategori['id']) {
            array_push($errors, 'Nama sudah ada!');
        }
        
        if (isset($kategori['tambah-kategori'])) {
            array_push($errors, 'Nama sudah ada!');
        }

    }

    return $errors;
}
