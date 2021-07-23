<?php

include(ROOT_PATH . "/blog/app/database/db.php");
include(ROOT_PATH . "/blog/app/helpers/validateUser.php");
include(ROOT_PATH . "/blog/app/helpers/middleware.php");

$table = 'users'; //kode serbaguna

$admin_users = selectAll($table);

$errors = array();

$id = '';
$username = ''; // Berfungsi menyimpan username terakhir di form agar tidak hilang 
$nama_lengkap = '';
$admin = '';
$email = '';
$password = '';
$passwordConf = '';


// Tanpa copy satu-satu
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Selamat akunmu telah dibuat!';
    $_SESSION['type'] = 'success';
    

    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . "/admin/dashboard.php"); // Kalo usernya admin redirect ke dashboard
    } else {
        header('location: ' . BASE_URL . '/index.php'); // Hanya untuk user biasa
    }
    
    exit();

}

if (isset($_POST['create-admin'])) {
    // Cek adakah error 
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        // Kalo register-btn ditekan akun dibuat
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Password di encrypt
        
        //Kalo user admin atau bukan
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Pengguna Admin berhasil dibuat!";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/blog/admin/users/index.php'); // Kalo usernya admin redirect ke dashboard
            exit();
        }else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            
            // Login User
            loginUser($user);
        }

    } else {
        // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

if (isset($_POST['register-btn']) ) {
    // Cek adakah error 
    $errors = validateUserDaftar($_POST);

    if (count($errors) === 0) {
        // Kalo register-btn ditekan akun dibuat
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Password di encrypt
        
        //Kalo user admin atau bukan
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "Pengguna Admin berhasil dibuat!";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/blog/admin/users/index.php'); // Kalo usernya admin redirect ke dashboard
            exit();
        }else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            
            // Login User
            loginUser($user);
        }

    } else {
        // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
        $username = $_POST['username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }

}

// Update user
if (isset($_POST['update-user'])) {
    adminOnly();
    // Cek adakah error 
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        // Kalo register-btn ditekan akun dibuat
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id'],);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //Password di encrypt
        

        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Pengguna Admin berhasil di-update!";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/blog/admin/users/index.php'); // Kalo usernya admin redirect ke dashboard
        exit();


    } else {
        // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}


// <!-- Update user dengan id -->
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]); 

    $id = $user['id'];
    // Jangan ambil password tidak aman
    $username = $user['username'];
    $admin = $user['admin'] == 1 ? 1 : 0;
    $email = $user['email'];
}


if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) { // Jika password benar akan return true
            //login redirect
            $_SESSION['id'] = $user['id'];
            $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['pesan'] = $user['nama_lengkap'];
            $_SESSION['type'] = 'success';
            

            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . "/blog/admin/posts/index.php"); // Kalo usernya admin redirect ke dashboard
            } else {
                header('location: ' . BASE_URL . '/index.php'); // Hanya untuk user biasa
            }

            exit();

        } else{ 
            // jika password salah
            array_push($errors, 'Password salah!');
        }
    }
    // Berfungsi menyimpan username terakhir di form agar tidak hilang jika pengguna tidak mengisi form
    $username = $_POST['username'];
    $password = $_POST['password'];
       
}

// Hapus pengguna admin di dashboard
if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Pengguna Admin dihapus";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/blog/admin/users/index.php'); // Kalo usernya admin redirect ke dashboard
    exit();
}