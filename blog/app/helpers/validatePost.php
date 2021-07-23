<?php

function validatePost($post)
{
    $errors = array();

    // count(array($errors));

    if (empty($post['title'])) {
        array_push($errors, 'Judul diperlukan!');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Harus di isi!');
    }

    if (empty($post['overview'])) {
        array_push($errors, 'Overview harus di isi!');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Kategori diperlukan!');
    }


    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {

        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Post dengan judul itu sudah ada!');
        }
        
        if (isset($post['add-post'])) {
            array_push($errors, 'Post dengan judul itu sudah ada!');
        }

    }


    return $errors;
}

