<?php 


?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    
    <!-- Navbar -->
    <!-- <div class="scroll-atas-btn">
        <i class="fas fa-angle-up"></i>
    </div> -->
    <nav class="navigasi">
        <div class="tinggi-maks">
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
            <div class="logoku"><a href="">Website<span>ku</span></a></div>
            <ul class="pesanan">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Skills</a></li>
                <li><a href="">Teams</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <!-- <input type="checkbox" id="centang">
            <label for="centang" class="icon-cari">
                <i class="fas fa-search "></i>                
            </label>
            <form action="#" class="kotak-cari">
                <input type="text" placeholder="Mau cari apa?..." required>
                <button type="submit" class="ayo-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
            </form> -->
        </div>
    </nav>

    <!-- Header - set the background image for the header in the line below-->
    <section  class="rumah">
        <div class="py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6 my-4">
                        <div class="text-center my-2 position-absolute top-50 start-50 translate-middle">
                            <h1 class="fw-bolder text-white mb-2">Halo namaku, </h1>
                            <h1 class="fw-bolder text-danger mb-1">Andy Rahman Ramadhan</h1>
                            <p class="lead text-white-50 mb-4">Saya belajar Web Development dengan cara otodidak, saya suka belajar mengenai hal baru itulah mengapa saya suka Web Development.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-danger btn-lg px-4 me-sm-3" href="#features">Ayo Mulai!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="tentang py-5" id="about">
        <div class="tinggi-maks">
            <h2 class="judul text-center">Tentang aku</h2>
            <div class="tentang-content">
                <div class="kolom kiri">
                    <img src="images/profile-1.jpeg" alt="">
                </div>
                <div class="kolom kanan">
                    <div class="teks">I'm Prakash and I'm a <span class="typing-2"></span></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae. Explicabo illo unde, odio consequatur ipsam possimus veritatis, placeat, ab molestiae velit inventore exercitationem consequuntur blanditiis omnis beatae. Dolor iste excepturi ratione soluta quas culpa voluptatum repudiandae harum non.</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <!-- services section start -->
    <section class="layanan" id="services">
        <div class="tinggi-maks">
            <br>
            <br>
            <br>
            <br>
            <h2 class="judul text-center">Keahlian saya</h2>
            <div class="layanan-content">
                <div class="kartu">
                    <div class="kotak">
                        <i class="fab fa-css3-alt"></i>
                        <div class="teks">CSS</div>
                    </div>
                </div>
                <div class="kartu">
                    <div class="kotak">
                        <i class="fab fa-html5"></i>
                        <div class="teks">HTML</div>
                    </div>
                </div>
                <div class="kartu">
                    <div class="kotak">
                        <i class="fab fa-php"></i>
                        <div class="teks">PHP</div>
                    </div>
                </div>
               </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </section>

    <!-- Blog preview section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">From our blog</h2>
                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="blog.php"><h5 class="card-title mb-3">Blog post title</h5></a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Another blog post title</h5></a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5></a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Evelyn Martinez</div>
                                        <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p>Hello readers, Today in this blog you’ll learn how to create a Fully Responsive Personal Portfolio Website using HTML CSS & JavaScript. I already shared many blogs on web design stuff like [Navigation Bar, Cards, Image Slider, Owl Carousel, Buttons, and many more] but still I’ haven’t created a full website and now it’s time to create a portfolio website. Personal portfolio sites are consistent that need to be taken care of throughout your work. It gives a convenient way for potential clients to view your work while also letting you expand on your skills/experiences and services.</p>
    <p>On this site [Personal Portfolio], there are six sections on one page – Home, About, Services, Skills, Teams, and Contact, and each section is attractive and eye-catching. On the home page of this site, on the top, there is a sticky navigation bar with a logo on the left side and some navigation links are on the right side. On the left side of the home page, there are texts which are about the author’s name, profession, and a button labeled as “Hire me” as you can see in the image.</p>
    <p>Hello readers, Today in this blog you’ll learn how to create a Fully Responsive Personal Portfolio Website using HTML CSS & JavaScript. I already shared many blogs on web design stuff like [Navigation Bar, Cards, Image Slider, Owl Carousel, Buttons, and many more] but still I’ haven’t created a full website and now it’s time to create a portfolio website.

Personal portfolio sites are consistent that need to be taken care of throughout your work. It gives a convenient way for potential clients to view your work while also letting you expand on your skills/experiences and services.</p>
    <p>On this site [Personal Portfolio], there are six sections on one page – Home, About, Services, Skills, Teams, and Contact, and each section is attractive and eye-catching. On the home page of this site, on the top, there is a sticky navigation bar with a logo on the left side and some navigation links are on the right side. On the left side of the home page, there are texts which are about the author’s name, profession, and a button labeled as “Hire me” as you can see in the image.</p>


    <?php include('templates/footer.php'); ?>

</html>


