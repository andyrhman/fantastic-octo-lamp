<?php

function validateUpdatePost($post)
{
    $errors = array();

    // count(array($errors));

    if (empty($post['title'])) {
        array_push($errors, 'Judul diperlukan!');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Harus di isi!');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Kategori diperlukan!');
    }

    return $errors;
}

