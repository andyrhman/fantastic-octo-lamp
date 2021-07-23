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
        <script src="../../../ckeditor/ckeditor.js"></script>

        <title>Bagian Admin - Buat Posts</title>
    </head>

    <body>
        <?php include(ROOT_PATH . '/blog/app/includes/adminHeader.php'); ?>
        

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

                    <h2 class="page-title">Tambah Posts</h2>
                    <?php include(ROOT_PATH . "/blog/app/helpers/formErorrs.php"); ?>
                    
                    <form action="create.php" method="post" enctype="multipart/form-data">  <!-- enctype berguna mengambil gambar dari komputer -->
                        <div>
                            <label>Judul</label>
                            <input type="text" name="title" value="<?php echo $title?>" class="text-input">
                        </div>
                        <div>
                            <label>Isi</label>
                            <textarea id="editor1" name="body"><?php echo $body?></textarea>
                        </div>
                        <div>
                            <label>Overview</label>
                            <textarea name="overview" id="body"><?php echo $overview?></textarea>
                        </div>
                        <div>
                            <label>Gambar</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Kategori</label>
                            <select name="topic_id" class="text-input">
                            <option value=""></option>
                            <!-- Berguna mendisplay kategori yang sudah dibuat -->
                            <?php foreach ($topics as $key => $topic):?>
                                
                                <?php if (!empty($topic_id) && $topic_id == $topic['id']):?>
                                    <option selected value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                <?php else:?>
                                    <option value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                <?php endif;?>
                                
              
                            <?php endforeach;?>


                            </select>
                        </div>
                        <div>
                        <?php if(empty($published)): ?>
                            <label>
                                <input type="checkbox" name="publish" id="">
                                Unggah
                            </label>
                        <?php else:?>
                            <label>
                                <input type="checkbox" name="publish" id="" checked>
                                Unggah
                            </label>
                        <?php endif;?>
                        </div>
                        <div>
                            <button type="submit" name="add-post" class="tombol tombol-big">Oke</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1', {
                height: 300,
                filebrowserUploadUrl: "../../../upload.php"
            });
        </script>
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