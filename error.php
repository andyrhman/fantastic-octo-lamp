<?php 
    include('path.php');

?>

<!DOCTYPE html>
    <?php include(ROOT_PATH . "/blog/app/includes/header.php"); ?>
    <link href='https://fonts.googleapis.com/css?family=Akaya Kanadaka' rel='stylesheet'>
    <br>

    <div class="text-center">

        <h3 class="ml-5 asd text" >404 Halaman tidak ditemukan...</h3>
        <div><a class="btn btn-dark" href="<?php echo BASE_URL . '/home' ?>" role="button"><i class="fas fa-home fa-fw"></i>Kembali</a></div>
        <br>
        <img src="https://media.giphy.com/media/n9ewEcw0oyHEYEuH1c/giphy.gif" class="img-fluid" alt="Error 404">
    
    </div>
    <style>
        .text{
            font-size: 20px;
            font-family: 'Akaya Kanadaka'; font-size: 22px;
        }
    </style>
    <?php include(ROOT_PATH . "/blog/app/includes/footer.php"); ?>