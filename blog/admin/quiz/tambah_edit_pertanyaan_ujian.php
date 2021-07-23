<?php include('../../../path.php');?>
<?php
include("../../../connect.php");

$id = $_GET['id'];
$kategoriquiz = '';
$res = mysqli_query($conn, "SELECT * FROM kategori_quiz WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $kategoriquiz = $row['kategori'];
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daftar Ujian</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Pertanyaan</th>
                                            <th scope="col">Opsi 1</th>
                                            <th scope="col">Opsi 2</th>
                                            <th scope="col">Opsi 3</th>
                                            <th scope="col">Opsi 4</th>
                                            <th scope="col">Jawaban</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php                        
                                        $sql = "SELECT * FROM pertanyaan WHERE kategori='$kategoriquiz' ORDER BY no_pertanyaan ASC";
                                        $res = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_array($res))
                                        {
                                        
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["no_pertanyaan"]; ?></th>
                                                <td><?php echo $row["pertanyaan"]; ?></td>
                                                <td><?php 

                                                    if (strpos($row["opt1"], "opt_images/") !== false) {
                                                        ?>
                                                            <img src="<?php echo $row["opt1"];?>" height="50" width="50" alt="gambar">
                                                        <?php
                                                    } else {
                                                        echo $row["opt1"];
                                                    }
                                                
                                                ?></td>

                                                <td><?php 

                                                if (strpos($row["opt2"], "opt_images/") !== false) {
                                                    ?>
                                                        <img src="<?php echo $row["opt2"];?>" height="50" width="50" alt="gambar">
                                                    <?php
                                                } else {
                                                    echo $row["opt2"];
                                                }

                                                ?></td>

                                                <td><?php 

                                                if (strpos($row["opt3"], "opt_images/") !== false) {
                                                    ?>
                                                        <img src="<?php echo $row["opt3"];?>" height="50" width="50" alt="gambar">
                                                    <?php
                                                } else {
                                                    echo $row["opt3"];
                                                }

                                                ?></td>

                                                <td><?php 

                                                if (strpos($row["opt4"], "opt_images/") !== false) {
                                                    ?>
                                                        <img src="<?php echo $row["opt4"];?>" height="50" width="50" alt="gambar">
                                                    <?php
                                                } else {
                                                    echo $row["opt4"];
                                                }

                                                ?></td>

                                                <td><?php 

                                                if (strpos($row["jawaban"], "opt_images/") !== false) {
                                                    ?>
                                                        <img src="<?php echo $row["jawaban"];?>" height="50" width="50" alt="gambar">
                                                    <?php
                                                } else {
                                                    echo $row["jawaban"];
                                                }

                                                ?></td>

                                                <td><?php 

                                                if (strpos($row["opt4"], "opt_images/") !== false) {
                                                    ?>
                                                        <a href="edit_opsi_gambar.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id?>">Edit</a> 
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="edit_opsi.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id?>">Edit</a>
                                                    <?php
                                                }

                                                ?></td>

                                                <td><a href="delete_opsi.php?id=<?php echo $row["id"]; ?>&id1=<?php echo $id?>">Delete</a></td>

                                            </tr>
                                        
                                            <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>               
                    <div class="breadcrumbs">
                        <div class="col-sm-6">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <div>Buat Pertanyaan Ujian <span style="color: red;"><?php echo $kategoriquiz?></span> Dengan Teks</div>
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
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan Ujian</label><input type="text" name="pertanyaan" placeholder="Buat Pertanyaan Ujian" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 1</label><input type="text" name="opsi1" placeholder="Buat Pertanyaan opsi 1" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 2</label><input type="text" name="opsi2" placeholder="Buat Pertanyaan opsi 2" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 3</label><input type="text" name="opsi3" placeholder="Buat Pertanyaan opsi 3" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 4</label><input type="text" name="opsi4" placeholder="Buat Pertanyaan opsi 4" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Jawaban</label><input type="text" name="jawaban" placeholder="Buat Jawaban" class="form-control"></div>
                                        <div><button type="submit" name="submit1" class="btn btn-success">Tambah Ujian!</button></div>
                                </div>
                            </div>  
                        </div> <!-- .content -->


                         <br>           
                        <!-- Pertanyaan dengan teks & gambar -->
                        <div class="breadcrumbs">
                            <div class="col-sm-6">
                                <div class="page-header float-left">
                                    <div class="page-title">
                                        <div>Buat Pertanyaan Ujian <span style="color: red;"><?php echo $kategoriquiz?></span> Dengan Gambar</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"><strong>Edit</strong><small> Ujian</small></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan Ujian</label><input type="text" name="fpertanyaan" placeholder="Buat Pertanyaan Ujian" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 1</label><input type="file" name="fopsi1" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 2</label><input type="file" name="fopsi2" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 3</label><input type="file" name="fopsi3" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Pertanyaan opsi 4</label><input type="file" name="fopsi4" class="form-control"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Jawaban</label><input type="file" name="fjawaban" class="form-control"></div>

                                        <div><button type="submit" name="submit2" class="btn btn-success">Tambah Ujian!</button></div>
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

</html>
<?php
    if (isset($_POST['submit1'])) { 

    $loop = 0;
    $count = 0;
    $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$kategoriquiz' ORDER BY id ASC") or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        # code...
    }else{
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop+1;
            mysqli_query($conn, "UPDATE pertanyaan SET no_pertanyaan='$loop' WHERE id=$row[id]");
        }
    }

    $loop = $loop+1;

    mysqli_query($conn, "INSERT INTO pertanyaan VALUES (NULL, '$loop', '$_POST[pertanyaan]', '$_POST[opsi1]', '$_POST[opsi2]', '$_POST[opsi3]', '$_POST[opsi4]', '$_POST[jawaban]', '$kategoriquiz')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Pertanyaan sukses ditambah!");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<?php
    if (isset($_POST['submit2'])) { 

    $loop = 0;
    $count = 0;
    $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$kategoriquiz' ORDER BY id ASC") or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);

    if ($count == 0) {
        # code...
    }else{
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop+1;
            mysqli_query($conn, "UPDATE pertanyaan SET no_pertanyaan='$loop' WHERE id=$row[id]");
        }
    }

    $loop = $loop+1;

    $tm = md5(time());

    $fnm1 = $_FILES["fopsi1"]["name"];
    $dst1 = "./opt_images/" . $tm . $fnm1;
    $dst_db1 = "opt_images/" . $tm . $fnm1;
    move_uploaded_file($_FILES["fopsi1"] ["tmp_name"], $dst1);

    $fnm2 = $_FILES["fopsi2"]["name"];
    $dst2 = "./opt_images/" . $tm . $fnm2;
    $dst_db2 = "opt_images/" . $tm . $fnm2;
    move_uploaded_file($_FILES["fopsi2"] ["tmp_name"], $dst2);

    $fnm3 = $_FILES["fopsi3"]["name"];
    $dst3 = "./opt_images/" . $tm . $fnm3;
    $dst_db3 = "opt_images/" . $tm . $fnm3;
    move_uploaded_file($_FILES["fopsi3"] ["tmp_name"], $dst3);

    $fnm4 = $_FILES["fopsi4"]["name"];
    $dst4 = "./opt_images/" . $tm . $fnm4;
    $dst_db4 = "opt_images/" . $tm . $fnm4;
    move_uploaded_file($_FILES["fopsi4"] ["tmp_name"], $dst4);

    $fnm5 = $_FILES["fjawaban"]["name"];
    $dst5 = "./opt_images/" . $tm . $fnm5;
    $dst_db5 = "opt_images/" . $tm . $fnm5;
    move_uploaded_file($_FILES["fjawaban"] ["tmp_name"], $dst5);


    mysqli_query($conn, "INSERT INTO pertanyaan VALUES (NULL, '$loop', '$_POST[fpertanyaan]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$dst_db5', '$kategoriquiz')") or die(mysqli_error($conn));

    ?>
    <script type="text/javascript">
        alert("Pertanyaan sukses ditambah!");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>