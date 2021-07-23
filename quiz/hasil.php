<?php

include("../path.php");
include(ROOT_PATH . "/blog/app/controllers/users.php");
usersOnly();

$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H-i-s", strtotime($date . " + $_SESSION[exam_time] minutes"));

?>
<!DOCTYPE html>
<html>

<?php include("../blog/app/includes/header.php")?>


    <div class="container">
        <div class="d-flex justify-content-center my-5">
            
        <?php
            $benar = 0;
            $salah = 0;

            if (isset($_SESSION["jawaban"])) 
            {
                for ($i=1; $i <= sizeof($_SESSION["jawaban"]); $i++) { 
                    $jawaban = "";
                    $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$_SESSION[kategori_quiz]' && no_pertanyaan= $i");
                    while ($row = mysqli_fetch_array($res)) {
                        $jawaban = $row["jawaban"];
                    }

                    if (isset($_SESSION["jawaban"][$i])) {
                       if ($jawaban == $_SESSION["jawaban"][$i]) {
                           $benar = $benar + 1;
                       }else 
                       {
                           $salah = $salah + 1 ;
                       }
                    }else 
                    {
                        $salah = $salah + 1;
                    }
                }
            }

            $count = 0;

            $res = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE kategori='$_SESSION[kategori_quiz]'");
            $count = mysqli_num_rows($res);
            $salah = $count - $benar;
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                                </div>
                                <div>
                                <h4>Total pertanyaan</h4>
                                <p class="mb-0">Monthly blog posts</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <h2 class="h1 mb-0"><?php echo $count ?></h2>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                <i class="far fa-check-circle text-success fa-3x me-4"></i>
                                </div>
                                <div>
                                <h4>Jawaban Benar</h4>
                                <p class="mb-0">Monthly blog posts</p>
                                </div>
                                
                            </div>
                            <div class="align-self-center">
                                <h2 class="h1 mb-0"><?php echo $benar ?></h2>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                <i class="far fa-times-circle text-danger fa-3x me-4"></i>
                                </div>
                                <div>
                                <h4>Jawaban Salah</h4>
                                <p class="mb-0">Monthly blog posts</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <h2 class="h1 mb-0"><?php echo $salah ?></h2>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        ?>

            
        </div>
    </div>

    
<?php 

if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($conn, "INSERT INTO hasil_quiz(id, nama_lengkap, tipe_quiz, total_pertanyaan, jawaban_benar, jawaban_salah, waktu_ujian) VALUES(NULL, '$_SESSION[nama_lengkap]', '$_SESSION[kategori_quiz]', '$count', '$benar', '$salah', '$date')");
}

if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"])

    ?>
        <script type="text/javascript">
           
           window.location.href = window.location.href;
            
        </script>

    <?php

}

?>


<?php include("../blog/app/includes/footer.php")?>
