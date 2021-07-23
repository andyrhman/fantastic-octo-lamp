<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL . '/index.php'; ?>">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                
                <!-- Cek apakah user login -->
                <?php if (isset($_SESSION['id'])):?>
                <!-- Icon dropdown -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><i class="fas fa-user fa-fw"></i><?php echo strtoupper($_SESSION['nama_lengkap']); ?></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <!-- Kalo usernya admin -->
                        <?php if($_SESSION['admin']):?>
                        <li><a class="dropdown-item" href="#">Dashboard</a></li> 
                        <?php endif;?>
                        <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
                    </ul>
                </li>
                <!-- Kalo usernya bukan admin -->
            <?php else:?>    
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/daftar.php' ?>">Daftar</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . '/login.php' ?>">login</a></li>
            <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>