<?php include('../../../path.php');?>
<?php 
include("../../../quiz/app/controllers/kategori.php");
include("../../../connect.php");
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
                    <a href="daftar_pertanyaan_ujian.php" class="tombol tombol-big">Tambah dan Edit Ujian</a>
                </div>


                <div class="content">
                    <!-- Kategori -->
                    <form name="form1" action="kategori_ujian.php" method="post">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><strong>Form</strong><small> Ujian</small></div>
                                <?php include(ROOT_PATH . "/quiz/app/helpers/formsError.php"); ?>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Kategori Ujian Baru</label>
                                            <input type="text" name="kategori" value="<?php echo $kategori?>" placeholder="Kategori Ujian" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Waktu Ujian</label>
                                            <input type="text" name="waktu_ujian" value="<?php echo $waktu_ujian?>" placeholder="Waktu" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Token</label>
                                            <input type="text" name="token" value="<?php echo $token?>" placeholder="Token" class="form-control">
                                        </div>
                                        <div class="form-group">
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
                                        <div><button type="submit" name="submit1" class="btn btn-success">Tambah Ujian</button></div>
                                </div>
                            </div>  
                        </div> <!-- .content -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Kategori Ujian</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Ujian</th>
                                                <th scope="col">Waktu Ujian</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Hapus</th>
                                                <th scope="col">Unggah</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            $count = 0;
                                            $sql = "SELECT * FROM kategori_quiz";
                                            $res = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_array($res))
                                            {
                                            $count = $count+1;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?></th>
                                                    <td><?php echo $row["kategori"]; ?></td>
                                                    <td><?php echo $row["waktu_ujian"]; ?></td>
                                                    <td><a href="edit_Kategori_ujian.php?id=<?php echo $row["id"]?>">Edit</a></td>
                                                    <td><a href="delete.php?id=<?php echo $row["id"]?>">Delete</a></td>

                                                    <?php if ($row["publish"]): ?>
                                                    <td><a href="unggah.php?published=0&p_id=<?php echo $row['id']?>">Jangan Unggah</a></td>
                                                    <?php else:?>
                                                    <td><a href="unggah.php?published=1&p_id=<?php echo $row['id']?>">Unggah</a></td>
                                                    <?php endif;?>
                                                </tr>
                                            
                                                <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

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