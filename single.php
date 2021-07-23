<?php include("path.php"); // Root path?>
<?php 
include(ROOT_PATH . "/blog/app/controllers/post.php"); 
include(ROOT_PATH . "/blog/app/controllers/pagination.php"); 



if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);

}


if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "Hasil kategori '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
    $posts = searchPosts($_POST['search-term']);
}else {
    $posts = getPublishedPosts();
}

$kategoris = selectAll('kategori');
$posts = selectAll('posts', ['publish' => 1]);

?>


<!DOCTYPE html>
<html>
<head>


  <title>Blogku - <?php echo $post['title'];?></title>

</head>

    <?php include(ROOT_PATH . "/blog/app/includes/header.php"); ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php echo $post['title'];?></h1>
                        <!-- Post meta content-->

                        <div class="text-muted fst-italic mb-2">Di posting <?php echo date('F j, Y', strtotime($post['created_at']));?> oleh admin</div>
                        

                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo BASE_URL. '/blog/gambar/' . $post['image'];?>" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                    
                        <p class="fs-5 mb-4"><?php echo html_entity_decode($post['body'])?></p>

                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                    <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                        </div>
                                    </div>
                                    <!-- Child comment 2-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When you put money directly to a problem, it makes a good headline.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single comment-->
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                <!-- Side widget-->
                <div>
                    <div>
                        <div class="sidebar widget">
                            <h5 class="card-header bg-dark text-white">Post Terkini</h5>                  
                            <br>
                            <?php while ($row = mysqli_fetch_array($result)):?>
                            <ul>
                                <li style="list-style: none;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <div class="sidebar-thumb">
                                            <img class="card-img h-80 w-80" src="<?php echo BASE_URL. '/blog/gambar/' . $row['image'];?>" alt="ss" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="sidebar-content">
                                            <h5 style="font-size: 15px;"><a href="<?php echo $row['id']; ?>"><?php echo $row['title']?></a></h5>
                                        </div>
                                        <div class="sidebar-meta" style="font-size: 12px;">
                                            <span><i class="far fa-calendar fa-fw"></i><?php echo date('F j, Y', strtotime($row['created_at']));?></span>
                                        </div>
                                    </div>
                                </div>
                                </li>
                            </ul>
                            <?php endwhile; ?>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include(ROOT_PATH . "/blog/app/includes/footer.php"); ?>
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


</html>