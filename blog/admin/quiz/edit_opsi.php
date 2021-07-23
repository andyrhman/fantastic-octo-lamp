<?php
include('../../../path.php');
include("../../../connect.php");

$id = $_GET['id'];
$id1 = $_GET['id1'];

$pertanyaan = '';
$opsi1 = '';
$opsi2 = '';
$opsi3 = '';
$opsi4 = '';
$jawaban = '';

$res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $pertanyaan = $row["pertanyaan"];
    $opsi1 = $row["opt1"];
    $opsi2 = $row["opt2"];
    $opsi3 = $row["opt3"];
    $opsi4 = $row["opt4"];
    $jawaban = $row["jawaban"];

}

?>

<!doctype html>
<html class="no-js" lang="en">
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
                    <div class="breadcrumbs">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <div>Edit</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pertanyaan dengan teks -->
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan Ujian</label><input type="text" name="pertanyaan" value="<?php echo $pertanyaan?>" placeholder="Buat Pertanyaan Ujian" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 1</label><input type="text" name="opsi1" value="<?php echo $opsi1?>" placeholder="Buat Pertanyaan opsi 1" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 2</label><input type="text" name="opsi2" value="<?php echo $opsi2?>" placeholder="Buat Pertanyaan opsi 2" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 3</label><input type="text" name="opsi3" value="<?php echo $opsi3?>" placeholder="Buat Pertanyaan opsi 3" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 4</label><input type="text" name="opsi4" value="<?php echo $opsi4?>" placeholder="Buat Pertanyaan opsi 4" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Jawaban</label><input type="text" name="jawaban" value="<?php echo $jawaban?>" placeholder="Buat Jawaban" class="form-control"></div>
                                        <div><button type="submit" name="submit1" class="btn btn-success">Update Ujian!</button></div>
                                </div>
                            </div>  
                        </div> <!-- .content -->
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



<?php

if (isset($_POST['submit1'])) {
    mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[pertanyaan]', opt1='$_POST[opsi1]', opt2='$_POST[opsi2]', opt3='$_POST[opsi3]', opt4='$_POST[opsi4]', jawaban='$_POST[jawaban]' WHERE id=$id ");

    ?>
    <script type="text/javascript">
        window.location="tambah_edit_pertanyaan_ujian.php?id=<?php echo $id1?>"
    </script>
    <?php
}

?>


<?php include("footer.php")?>

</html>