<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $judul_halaman; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/drivin-1/img/spp.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= site_url('asset/drivin-1') ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= site_url('asset/drivin-1') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= site_url('asset/drivin-1') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= site_url('asset/drivin-1') ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small><?= $konfig->alamat; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small><?= $konfig->hari_buka; ?> : <?= $konfig->waktu_buka; ?></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+62 <?= $konfig->no_wa; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $konfig->facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $konfig->youtube; ?>"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $konfig->tiktok; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26 26" style="fill: #F3BD00;">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"></path>
                        </svg>
                    </a>
                    <a class="btn btn-square btn-link rounded-0" href="<?= $konfig->instagram; ?>"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="<?= site_url() ?>" class="navbar-brand d-flex align-items-center">
            <?php foreach ($fotologo as $aa) { ?>
                <div class="col-lg-6">
                    <img class="m-0" src="<?= base_url('asset/upload/logo/'.$aa['foto_logo']) ?>" alt="" width="300" height="80">
                </div>
            <?php } ?>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= site_url('home') ?>" class="nav-item nav-link active">Beranda</a>
                <a href="<?= site_url('about') ?>" class="nav-item nav-link">Tentang</a>
                <a href="<?= site_url('armada') ?>" class="nav-item nav-link">Armada</a>
                <a href="<?= site_url('jadwal') ?>" class="nav-item nav-link">Jadwal</a>
                <a href="<?= site_url('contact') ?>" class="nav-item nav-link">Kontak</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php $no = 0; foreach ($caraousel as $aa) { ?>
                <div class="carousel-item <?php if ($no == 0) echo 'active'; ?>">
                    <img class="w-100" src="<?= base_url('asset/upload/caraousel/' . $aa['foto']) ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown"><?= $aa['judul'] ?></h1>
                                    <a href="<?= site_url('about') ?>" class="btn btn-primary py-sm-3 px-sm-5">Tentang</a>
                                    <a href="<?= site_url('contact') ?>" class="btn btn-light py-sm-3 px-sm-5 ms-3">Kontak Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $no++; } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


<!-- Facts Start -->
<div class="container-fluid facts py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0 justify-content-center"> <!-- Tambahkan kelas justify-content-center di sini -->


        <div class="col-lg-2 m-1 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-users text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h2><?= $konfigabout->member; ?></h2>
                            <span>Anggota</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 m-1 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-bus text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h2><?= $konfigabout->armada; ?></h2>
                            <span>Armada</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 m-1 wow fadeIn" data-wow-delay="0.7s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-file-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h2><?= $konfigabout->perjalanan; ?></h2>
                            <span>Perjalanan</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-3 mb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-primary text-uppercase mb-2">Beranda</h6>
                    <h3 class="mb-4">Dashboard  </h3>
                    <p class="mb-5"><?= $konfig->profil_website; ?></p>
                    <div class="row gy-5 gx-4">

                    <div class="row pt-4 mt-5">
                    <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                        <a href="https://wa.me/<?= $konfig->no_wa; ?>">
                                        <i class="fa fa-phone-alt text-white"></i>
                                        </a>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-2">Whatsapp</p>
                                        <h5 class="mb-0">
                                            <a href="https://wa.me/<?= $konfig->no_wa; ?>">
                                            +62 <?= $konfig->no_wa; ?>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                        <i class="fa fa-envelope-open text-white"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-2">Email</p>
                                        <h5 class="mb-0">
                                            <?= $konfig->email; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                <?php foreach ($fotohome as $aa) { ?>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px;">
                            <img class="position-absolute w-100 h-100" src="<?= base_url('asset/upload/home/'.$aa['foto_home']) ?>" alt="" style="object-fit: cover;">
                            <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3" src="<?= base_url('asset/upload/home/'.$aa['foto_home']) ?>" alt="" style="width: auto; height: 200px">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Features End -->

        
        <!-- Courses Start -->
        <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">armada</h6>
                <h3 class="mb-4">Armada Terbaru</h3>
            </div>
            <div class="row g-4 justify-content-center">
            <?php foreach ($konten as $kntn) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <h5 class="mb-3 mt-4"><?= $kntn['judul'] ?></h5>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i><?= $kntn['nama_kategori'] ?></li>
                                <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i><?= $kntn['kursi'] ?> Kursi</li>
                            </ol>
                            <span class="breadcrumb-item small">Klik untuk melihat detail</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="<?= base_url('asset/upload/konten/' . $kntn['foto']) ?>" alt="">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="<?= site_url('detail/detail_armada/' . $kntn['id_konten']) ?>">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Kantor</h4>
                    <h5 class="text-primary mb-4"><i class="fa fa-bus text-white me-2"></i><?= $konfig->judul_website; ?></h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?= $konfig->alamat; ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 <?= $konfig->no_wa; ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?= $konfig->email; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Links</h4>
                    <a class="btn btn-link" href="<?= site_url('home') ?>">Beranda</a>
                    <a class="btn btn-link" href="<?= site_url('about') ?>">Tentang</a>
                    <a class="btn btn-link" href="<?= site_url('armada') ?>">Armada</a>
                    <a class="btn btn-link" href="<?= site_url('jadwal') ?>">Jadwal</a>
                    <a class="btn btn-link" href="<?= site_url('contact') ?>">Kontak</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Sosial Media</h4>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light me-1" href="<?= $konfig->instagram; ?>"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href="<?= $konfig->facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href="<?= $konfig->youtube; ?>"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light me-0" href="<?= $konfig->tiktok; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26 26" style="fill: white;">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"></path>
                        </svg>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Booking</h4>
                        <div>
                            <a href="https://wa.me/62<?= $konfig->no_wa; ?>" target="_blank" class="btn btn-primary px-4">Whatsapp<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    <h4 class="text-white mt-4 mb-3">Buka :</h4>
                    <?= $konfig->hari_buka; ?> <?= $konfig->waktu_buka; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> 
                            Sandpaper Holiday Trans
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= site_url('asset/drivin-1') ?>/lib/wow/wow.min.js"></script>
    <script src="<?= site_url('asset/drivin-1') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= site_url('asset/drivin-1') ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= site_url('asset/drivin-1') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= site_url('asset/drivin-1') ?>/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= site_url('asset/drivin-1') ?>/js/main.js"></script>
</body>

</html>