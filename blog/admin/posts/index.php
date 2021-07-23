<?php include('../../../path.php');?>
<?php include(ROOT_PATH . "/blog/app/controllers/post.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../css/login.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../css/admin.css">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
        <title>Bagian Admin - Kelola Posts</title>
    </head>

    <body>
        <?php include(ROOT_PATH . '/blog/app/includes/adminHeader.php'); ?>
        <?php include(ROOT_PATH . '/blog/app/includes/messagesKategori.php'); ?>
        <!-- Admin Page Wrapper -->
        <div class="admin-kumpul">


            <?php include(ROOT_PATH . '/blog/app/includes/adminSidebar.php'); ?>

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="tombol tombol-big">Tambah Post</a>
                    <a href="index.php" class="tombol tombol-big">Kelola Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Kelola Posts</h2>
                    
                    <table>
                        <thead>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Action</th>
                            <th>Action</th>
                            <th colspan="3">Action</th>
                            
                        </thead>
                        <tbody>

                            <?php foreach ($posts as $key => $post):?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['title'] ?></td>
                                <td><?php echo $post['username'];?></td>
                                <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a></td>
                                <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Hapus</a></td>

                                <?php if ($post['publish']):?>
                                <td><a href="edit.php?published=0&p_id=<?php echo $post['id']?>" class="unpublish">Jangan unggah</a></td>
                                <?php else: ?>
                                <td><a href="edit.php?published=1&p_id=<?php echo $post['id']?>" class="publish">Unggah</a></td>
                                <?php endif;?>

                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="../../js/script.js"></script>

    </body>

</html>