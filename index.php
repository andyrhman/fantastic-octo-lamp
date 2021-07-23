<?php 
include("path.php"); // Root path 

include(ROOT_PATH . "/blog/app/controllers/kategori.php"); 
include(ROOT_PATH . "/blog/app/controllers/pagination.php"); 


$posts = array();



if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "Hasil kategori '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
    $posts = searchPosts($_POST['search-term']);
}else {
    $posts = getPublishedPosts();

}




?>

<!DOCTYPE html>
<html>
    <?php include(ROOT_PATH . "/blog/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/blog/app/includes/messages.php"); ?> 
    <?php include(ROOT_PATH . "/blog/app/includes/messagesLogin.php"); ?> 


    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat datang di Blogku!</h1>
                <p class="lead mb-0">Blog ini menggunakan style Bootsrap 5 dan PHP</p>
            </div>
        </div>
    </header>

    <!-- Post Slider -->
    <div class="post-slider">
      <h1 class="slider-title">Trending Posts</h1>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

      <div class="post-wrapper">

      <?php foreach($posts as $post):?>
        <div class="post">
          <img src="<?php echo BASE_URL. '/blog/gambar/' . $post['image'];?>" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="post/<?php echo $post['id']; ?>"><?php echo $post['title']?></a></h4>
            <i class="far fa-user"><?php echo $post['username']; ?></i>
            &nbsp;
            <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at']));?></i>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
    <!-- // Post Slider -->
    <br>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-end my-4">
                        <?php for ($i=1; $i <= $number_f_pages ; $i++): ?>
                            <?php if($page==$i):?>
                            <li class="page-item active"><a class="page-link" href="home?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php else:?>
                            <li class="page-item"><a class="page-link" href="home?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endif;?>
                        <?php endfor; ?>
                    </ul>
                </nav>
                <div class="row ">
                    <h2>Post Terbaru</h2>
                    <?php while ($row = mysqli_fetch_array($result)):?>
					<div class="card mb-4">
						<div class="row no-gutters">
							<div class="col-md-4">
								<img class="card-img h-100" src="<?php echo BASE_URL. '/blog/gambar/' . $row['image'];?>" alt="Card image cap">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h2 class="card-title" style="font-size:18px;"><a href="post/<?php echo $row['id']; ?>"><?php echo $row['title'];?></a></h2>
                                    <div class="text-muted">
                                        <span style="font-size:12px"><i class="fas fa-user fa-fw"></i><?php echo $row['username']; ?></span>
                                        <span style="font-size:12px"><i class="far fa-calendar-alt"></i> <?php echo date('F j, Y', strtotime($row['created_at']));?></span>
                                    </div>
									<p class="card-text"><?php echo html_entity_decode(substr($row['overview'], 0, 150).'...');?></p>

								</div>
							</div>
						</div>
					</div>
                    <?php endwhile; ?>

                </div>

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <h5 class="card-header bg-dark text-white">Search</h5>
                    <div class="card-body">
                        <form action="search.php" method="post">
                            <div class="input-group">                       
                                <input class="form-control" name="search-term" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" type="submit">Go!</button>               
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <h5 class="card-header bg-dark text-white">Kategori</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php foreach ($kategoris as $key => $kategori):?>
                                    <li><a href="<?php echo BASE_URL . '/kategori.php?t_id=' . $kategori['id'] . '&name=' . $kategori['name']?>"><?php echo $kategori['name']; ?></a></li>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div>
                    <div>
                        <div class="sidebar widget">
                            <h5 class="card-header bg-dark text-white">Post Pilihan</h5>                  
                            <br>
                            <?php foreach($posts as $p):?>
                            <ul>
                                <li style="list-style: none;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <div class="sidebar-thumb">
                                            <img class="card-img h-80 w-80" src="<?php echo BASE_URL. '/blog/gambar/' . $p['image'];?>" alt="ss" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="sidebar-content">
                                            <h5 style="font-size: 15px;"><a href="single.php?id=<?php echo $p['id']; ?>"><?php echo $p['title']?></a></h5>
                                        </div>
                                        <div class="sidebar-meta" style="font-size: 12px;">
                                            <span><i class="far fa-calendar fa-fw"></i><?php echo date('F j, Y', strtotime($p['created_at']));?></span>
                                        </div>
                                    </div>
                                </div>
                                </li>
                            </ul>
                            <?php endforeach;?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(ROOT_PATH . "/blog/app/includes/footer.php"); ?>
    <script src="blog/js/sweetalert.min.js"></script> 

</html>
