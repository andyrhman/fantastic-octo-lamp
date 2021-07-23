<?php
include("../path.php");
include(ROOT_PATH . "/blog/app/controllers/users.php");
usersOnly();

?>
<!DOCTYPE html>
<html>

<?php include("../blog/app/includes/header.php")?>

    <div class="container">
        <div class="my-4">
            <?php
                $count = 0;
                $res = mysqli_query($conn, "SELECT * FROM hasil_quiz WHERE nama_lengkap='$_SESSION[nama_lengkap]' ORDER BY id DESC");
                $count = mysqli_num_rows($res);

                if ($count == 0) {
                    ?>
                    <div class="my-5">
                        
                        <h2 class="text-center">Hasil terakhir belum ada...</h2>
                        <div class="d-flex justify-content-center">
                            <img src="../assets/depression.png" class="img-fluid" alt="Error 404">
                        </div>
                        
                    </div>
                    <?php

                } else {
                                
                    ?>
                    <h2 class="text-center">Hasil Terakhir</h2>
                    <div class="table-responsive my-4">
                        <table class="table mb-5">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Total Pertanyaan</th>
                                <th scope="col">Jawaban Salah</th>
                                <th scope="col">Jawaban Benar</th>
                                <th scope="col">Tanggal Ujian</th>
                            </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_array($res)):?>
                            <tbody>
                            <tr>
                                <td><?php echo strtoupper($row["nama_lengkap"])?></td>
                                <td><?php echo $row["tipe_quiz"]?></td>
                                <td><?php echo $row["total_pertanyaan"]?></td>
                                <td><?php echo $row["jawaban_salah"]?></td>
                                <td><?php echo $row["jawaban_benar"]?></td>
                                <td><?php echo $row["waktu_ujian"]?></td>
                                                    
                            </tr>
                            </tbody>
                            <?php endwhile;?>
                        </table>
                    </div>
                    <?php
                         


                        
                    

                }

            ?>

            
        </div>
    </div>


