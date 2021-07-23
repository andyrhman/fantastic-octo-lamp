<?php
include("path.php"); // Root path 

include(ROOT_PATH . "/blog/app/controllers/kategori.php"); 

$posts = array();

if (isset($_POST['search-term'])) {
    $postTitle = "Hasil pencarian '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
}else {
    $posts = getPublishedPosts();
}


?>
<!DOCTYPE html>
<html>
    <?php include(ROOT_PATH . "/blog/app/includes/header.php"); ?>
    <link href='https://fonts.googleapis.com/css?family=Akaya Kanadaka' rel='stylesheet'>

    <br>
    <br>
    <div class="container">
        <div class="row">
            <h2 class="text-center"><?php echo $postTitle?></h2>
        </div>
    </div>
    
    <?php if ($posts): ?>
        <?php foreach($posts as $post):?>
        <div class="container">
            <div class="row">
                <div class="card mb-4 ml-5" style="max-width: 1000px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo BASE_URL. '/blog/gambar/' . $post['image'];?>" class="card-img h-100 w-100" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'];?></a></h5>
                                <div class="text-muted">
                                    <span style="font-size:12px"><i class="fas fa-user fa-fw"></i><?php echo $post['username']; ?></span>
                                    <span style="font-size:12px"><i class="far fa-calendar-alt"></i> <?php echo date('F j, Y', strtotime($post['created_at']));?></span>
                                </div>
                                <p class="card-text"><?php echo html_entity_decode(substr($post['overview'], 0, 150).'...');?></p>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else:?>
        <br>
        <div class="container">
            <div class="row">
                <h2 class="text-center text">Maaf yang anda cari tidak tersedia...</h2>
                <img src="https://media.giphy.com/media/3fmRTfVIKMRiM/giphy.gif" class="img-fluid w-50 center" alt="Tidak ditemukan">
            </div>
        </div>
    <?php endif;?>

        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            .text{
                font-size: 20px;
                font-family: 'Akaya Kanadaka'; font-size: 22px;
            }
        </style>

    <?php include(ROOT_PATH . "/blog/app/includes/footer.php"); ?>
</html>