<?php
include('../../../path.php');
include("../../../connect.php");

$id = $_GET["id"];
$res = mysqli_query($conn, "SELECT * FROM kategori_quiz where id=$id");
while ($row = mysqli_fetch_array($res)) {
    $kategori_ujian = $row['kategori'];
    $waktu_ujian = $row['waktu_ujian'];
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

    <?php include(ROOT_PATH . '/blog/app/includes/adminHeader.php'); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-kumpul">

    <?php include(ROOT_PATH . '/blog/app/includes/adminSidebar.php'); ?>
        <div class="admin-content">

            <div class="button-group">
                <a href="daftar_pertanyaan_ujian.php" class="tombol tombol-big">Tambah dan Edit Ujian</a>
            </div>


            <div class="content">
                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <div>Edit Kategori Ujian</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <form name="form1" action="" method="post">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>
                                <div class="card-body card-block">
                                    <div class="form-group"><label for="company" class=" form-control-label">Kategori Ujian Baru</label><input type="text" value="<?php echo $kategori_ujian; ?>" name="kategoriujian" placeholder="Kategori Ujian" class="form-control"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">Waktu Ujian</label><input type="text" value="<?php echo $waktu_ujian; ?>" name="waktuujian" placeholder="Waktu" class="form-control"></div>
                                    <div><button type="submit" name="submit1" class="btn btn-success">Update Ujian</button></div>
                            </div>
                        </div>  
                    </div> <!-- .content -->

                </form>
            </div>
        </div>
    </div>


<?php
if (isset($_POST['submit1'])) { 
    mysqli_query($conn, "UPDATE kategori_quiz set kategori='$_POST[kategoriujian]', waktu_ujian='$_POST[waktuujian]' WHERE id=$id") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
        window.location = "kategori_ujian.php";
    </script>
    <?php
}
?>


</html>
