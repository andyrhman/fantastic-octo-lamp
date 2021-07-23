<?php

include(ROOT_PATH . "/blog/app/database/db.php");
include(ROOT_PATH . "/blog/app/helpers/validatePost.php");
include(ROOT_PATH . "/blog/app/helpers/middleware.php");
//include(ROOT_PATH . "/blog/app/helpers/validateUpdatePost.php");

$table = 'posts'; //kode serbaguna

$users = selectAll('users');
$topics = selectAll('kategori'); //Mengambil semua database kategori untuk di-display di create post
$posts = get_posts_with_username();

$errors = array();
$id = '';
$title = '';
$body = '';
$overview = '';
$topic_id = '';
$published = '';

// <!-- Update post dengan id -->
if (isset($_GET['id'])) {
    $post = selectOne($table, ['id' => $_GET['id']]);

    if (isset($post) ? count($post) : 0) { 
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        $overview = $post['overview'];
        $topic_id = $post['topic_id'];
        $published = $post['publish'];
    } else {
        header('location: ' . BASE_URL . '/error.php');
        exit();
    }

}

// Hapus post
if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Post berhasil dihapus";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/blog/admin/posts/index.php');
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {    //published dari edit.php?published=0&p_id=<?php echo $post['id']
    adminOnly();
    $published = $_GET['published'];    //published dari edit.php?published=0&p_id=<?php echo $post['id']
    $p_id = $_GET['p_id'];
    //... update published
    $count = update($table, $p_id, ['publish' => $published]);  //'publish' diambli dari database

    $_SESSION['message'] = "Post publish berhasil diubah";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/blog/admin/posts/index.php');
    exit();
}


if (isset($_POST['add-post'])) {
    adminOnly();
    // ok($_FILES['image']['name']);
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        //Berfungsi mengupload gambar ke post
        $image_name = time() . '_' . $_FILES['image']['name']; 
        $destination = ROOT_PATH . '/blog/gambar/' . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        //

        //Menyimpan gambar di database di sebuah post
        if ($result) {
            $_POST['image'] = $image_name;
        } else{
            array_push($errors, "Gagal meng-upload gambar");
        }

    } else{
        array_push($errors, "Gambar dibutuhkan");
    }

    if (count($errors) === 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
        $_POST['body'] = htmlspecialchars($_POST['body']);
        $_POST['overview'] = htmlspecialchars($_POST['overview']);
    
        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Post berhasil dibuat";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/blog/admin/posts/index.php');
        exit();
    } else{
        $title = $_POST['title'];
        $body = $_POST['body'];
        $overview = $_POST['overview'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['publish']) ? 1 : 0;
    }

   
}

if (isset($_POST['update-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        //Berfungsi mengupload gambar ke post
        $image_name = time() . '_' . $_FILES['image']['name']; 
        $destination = ROOT_PATH . '/blog/gambar/' . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        //

        //Menyimpan gambar di database di sebuah post
        if ($result) {
            $_POST['image'] = $image_name;
        } else{
            array_push($errors, "Gagal meng-upload gambar");
        }

    } else{
        array_push($errors, "Gambar dibutuhkan!");
    }

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['publish'] = isset($_POST['publish']) ? 1 : 0;
        $_POST['body'] = htmlspecialchars($_POST['body']);
        $_POST['overview'] = htmlspecialchars($_POST['overview']);
    
        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Post update berhasil";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/blog/admin/posts/index.php');
        
    } else{
        $title = $_POST['title'];
        $body = $_POST['body'];
        $overview = $_POST['overview'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['publish']) ? 1 : 0;
    }

}