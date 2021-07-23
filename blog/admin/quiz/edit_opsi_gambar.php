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
                    <!-- Pertanyaan dengan teks & gambar -->
                    <div class="breadcrumbs">
                        <div class="col-sm-6">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <div>Edit Pertanyaan Ujian</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pertanyaan -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>

                            <form name="form1" action="" enctype="multipart/form-data" method="post">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Pertanyaan Ujian</label>
                                        <input type="text" name="fpertanyaan" value="<?php echo $pertanyaan?>" placeholder="Buat Pertanyaan Ujian" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Pertanyaan opsi 1</label>
                                        <div><img src="<?php echo $opsi1?>" alt="gambar" width="50" height="50"></div> <br>
                                        <input type="file" name="fopsi1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Pertanyaan opsi 2</label>
                                        <div><img src="<?php echo $opsi2?>" alt="gambar" width="50" height="50"></div> <br>
                                        <input type="file" name="fopsi2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Pertanyaan opsi 3</label>
                                        <div><img src="<?php echo $opsi3?>" alt="gambar" width="50" height="50"></div> <br>
                                        <input type="file" name="fopsi3" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Pertanyaan opsi 4</label>
                                        <div><img src="<?php echo $opsi4?>" alt="gambar" width="50" height="50"></div> <br>
                                        <input type="file" name="fopsi4" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Jawaban</label>
                                        <div><img src="<?php echo $jawaban?>" alt="gambar" width="50" height="50"></div> <br>
                                        <input type="file" name="fjawaban" class="form-control">
                                    </div>

                                    <div><button type="submit" name="submit2" class="btn btn-success">Update Ujian!</button></div>
                                </div>
                            </form> 
                                        
                        </div>  
                    </div> <!-- .content -->

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

if (isset($_POST['submit2'])) {

    $opt1 = $_FILES["fopsi1"]["name"];
    $opt2 = $_FILES["fopsi2"]["name"];
    $opt3 = $_FILES["fopsi3"]["name"];
    $opt4 = $_FILES["fopsi4"]["name"];
    $jawaban = $_FILES["fjawaban"]["name"];
 
    $tm = md5(time());

    if ($opt1!="") {

        $dst1 = "./opt_images/" . $tm . $opt1;
        $dst_db1 = "opt_images/" . $tm . $opt1;
        move_uploaded_file($_FILES["fopsi1"] ["tmp_name"], $dst1);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt1='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt2!="") {

        $dst2 = "./opt_images/" . $tm . $opt2;
        $dst_db2 = "opt_images/" . $tm . $opt2;
        move_uploaded_file($_FILES["fopsi2"] ["tmp_name"], $dst2);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt2='$dst_db2' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt3!="") {

        $dst3 = "./opt_images/" . $tm . $opt3;
        $dst_db3 = "opt_images/" . $tm . $opt3;
        move_uploaded_file($_FILES["fopsi3"] ["tmp_name"], $dst3);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt3='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($opt4!="") {

        $dst4 = "./opt_images/" . $tm . $opt4;
        $dst_db4 = "opt_images/" . $tm . $opt4;
        move_uploaded_file($_FILES["fopsi4"] ["tmp_name"], $dst4);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', opt4='$dst_db1' WHERE id=$id ") or die(mysqli_error($conn));

    }

    if ($jawaban!="") {

        $dst5 = "./opt_images/" . $tm . $jawaban;
        $dst_db5 = "opt_images/" . $tm . $jawaban;
        move_uploaded_file($_FILES["fjawaban"] ["tmp_name"], $dst5);
    
        mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]', jawaban='$dst_db5' WHERE id=$id ") or die(mysqli_error($conn));

    }

    mysqli_query($conn, "UPDATE pertanyaan SET pertanyaan='$_POST[fpertanyaan]' WHERE id=$id ") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        window.location="tambah_edit_pertanyaan_ujian.php?id=<?php echo $id1?>"
    </script>
    <?php
}

?>



<?php include("footer.php")?>

</html>