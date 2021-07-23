<?php 


?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="blog/css/style.css">


  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <title>Blogku</title>

</head>

<body>
  <!-- Responsive navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="<?php echo BASE_URL . '/home' ?>">Blogku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL . '/home' ?>">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL . '/quiz/pilih-ujian.php' ?>">Quiz</a></li>
                  <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                  
                  <!-- Cek apakah user login -->
                  <?php if (isset($_SESSION['id'])):?>
                  <!-- Icon dropdown -->

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><i class="fas fa-user fa-fw"></i><?php echo strtoupper($_SESSION['nama_lengkap']);  ?></span>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                          <!-- Kalo usernya admin -->
                          <?php if($_SESSION['admin']):?>
                          <li><a class="dropdown-item" href="<?php echo BASE_URL . '/blog/admin/posts/index.php'; ?>">Dashboard</a></li> 
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
