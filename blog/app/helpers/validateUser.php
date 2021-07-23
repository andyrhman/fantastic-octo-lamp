<?php

function validateUserDaftar($user)
{
    $errors = array();

    // count(array($errors));

    if (empty($user['username'])) {
        array_push($errors, 'Username diperlukan!');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email diperlukan!');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password diperlukan!');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password tidak sama!');
    }

    $existingUsername = selectOne('users', ['username' => $user['username']]);
    if (isset($existingUsername)) {
        array_push($errors, 'Username sudah ada!');
    }

    $existingUsername = selectOne('users', ['email' => $user['email']]);
    if (isset($existingUsername)) {
        array_push($errors, 'Email sudah ada!');
    }

    return $errors;
}


function validateUser($user)
{
    $errors = array();

    // count(array($errors));

    if (empty($user['username'])) {
        array_push($errors, 'Username diperlukan!');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email diperlukan!');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password diperlukan!');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password tidak sama!');
    }

    $existingUsername = selectOne('users', ['username' => $user['username']]);
    if (isset($existingUsername)) {
        array_push($errors, 'Username sudah ada!');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {

        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email sudah ada!');
        }
        
        if (isset($user['create-admin'])) {
            array_push($errors, 'Email sudah ada!');
        }

    }

    return $errors;
}

function validateLogin($user)
{
    $errors = array();


    if (empty($user['username'])) {
        array_push($errors, 'Username diperlukan!');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password diperlukan!');
    }


    return $errors;
}