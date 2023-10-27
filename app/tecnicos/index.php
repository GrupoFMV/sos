<?php

include "database/conexao.php";
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    @header("Location: logar.php");
}

// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['user_id'];
$sqluser = "SELECT * FROM users WHERE user_id = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);
$user = mysqli_fetch_array($exeuser);

ini_set('display_errors', 0 );
error_reporting(0);


?>


<!doctype html>
<html lang="pt_br">


<head>

<base href="http://localhost/SOSElevadores/app/tecnicos/" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">

    <link rel="apple-touch-icon" href="img/f7-icon-square.html">
    <link rel="icon" href="img/f7-icon.html">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="    https://fontawesome.com/v4/assets/font-awesome/css/font-awesome.css">


    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">

    <!-- swiper carousel CSS -->
    <link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">

    <!-- app CSS -->
    <link id="theme" rel="stylesheet" href="css/style.css" type="text/css">


    <title>SOS DOS ELEVADORES - TECNICOS</title>
</head>

<body class="color-theme-blue push-content-right theme-light">
    <div class="loader justify-content-center ">
        <div class="maxui-roller align-self-center">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper">
        <!-- sidebar left start -->
        <div class="sidebar sidebar-left">
            <div class="profile-link">
                <a href="home" class="media">
                    <div class="w-auto h-100">
                        <!-- <figure class="avatar avatar-40"><img src="img/user1.png" alt=""> </figure> -->
                    </div>
                    <div class="media-body">
                        <h5 class=" mb-0"><?php echo $user[user_nome] ?> <span class="status-online bg-success"></span></h5>
                       <?php if($user[user_especial] =='1') { ?> <p>Tecnico</p> <?php } ?>   <?php if($user[user_especial] =='2') { ?> <p>Tecnico Plantão</p> <?php } ?>
                    </div>
                </a>
            </div>
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="home" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">list</i> Chamados
                            </div>
                        </a>
                    </li>
                    <?php if($user[user_especial] =='2') { ?>
                    <li class="nav-item">
                        <a href="abrir_chamado" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">list</i> Abrir chamado
                            </div>
                        </a>
                    </li>

              <?php } ?>
                     <li class="nav-item">
                        <a href="registrar_evento" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">list</i> Registrar Evento
                            </div>
                        </a>
                    </li>
                    <!-- 
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">menu</i> Menu
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" class="sidebar-close  dropdown-item">
                             Menu Overlay (This)
                            </a>
                            <a href="#" class="sidebar-close dropdown-item menu-right">
                             Push Content
                            </a>
                            <a href="javascript:void(0)" class="sidebar-close dropdown-item popup-open" data-toggle="modal" data-target="#fullscreenmenu">
                             Full Screen
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">poll</i> Project
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="dashboard.html" class="sidebar-close dropdown-item">Dashbaord</a>
                            <a href="projects.html" class="sidebar-close dropdown-item">Projects</a>
                            <a href="project-detail.html" class="sidebar-close dropdown-item">Project Details</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">library_books</i> Pages
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="chat.html" class="sidebar-close dropdown-item">Chat</a>
                            <a href="comingsoon.html" class="sidebar-close dropdown-item">Coming Soon</a>
                            <a href="login.html" class="sidebar-close dropdown-item">Sign in</a>
                            <a href="register.html" class="sidebar-close dropdown-item">Sign Up</a>
                            <a href="forgot-password.html" class="sidebar-close dropdown-item">Forgot Password</a>
                            <a href="error.html" class="sidebar-close dropdown-item">Error</a>
                            <a href="404.html" class="sidebar-close dropdown-item">Error 404</a>
                            <a href="map.html" class="sidebar-close dropdown-item">Map</a>
                            <a href="fullmap.html" class="sidebar-close dropdown-item">Full Map</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">collections</i> Images
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="rounded-thumbnails.html" class="sidebar-close dropdown-item">Rounded Thumbnails</a>
                            <a href="circular-thumbnails.html" class="sidebar-close dropdown-item">Circular Thumbnails</a>
                            <a href="wide-images.html" class="sidebar-close dropdown-item">Wide Images</a>
                            <a href="wide-categories.html" class="sidebar-close dropdown-item">Wide Catogory</a>
                            <a href="gallery.html" class="sidebar-close dropdown-item">Gallery</a>
                            <a href="viwer.html" class="sidebar-close dropdown-item">Viewer</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="item-link item-content dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="item-title">
                                <i class="material-icons">view_carousel</i> Introduction
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <a href="carousel-intro.html" class="sidebar-close dropdown-item">Carousel Intro</a>
                            <a href="splash-intro.html" class="sidebar-close dropdown-item">Splash Carosuel</a>
                            <a href="small-intro.html" class="sidebar-close dropdown-item">Small Intro</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="user-profile.html" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">person</i> User Profile
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutus.html" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">domain</i> About
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="colorscheme.html" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">format_color_fill</i> Color Scheme
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="component.html" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">pages</i> Component
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contactus.html" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">add_location</i> Contact Us
                            </div>
                        </a>
                    </li> -->
                </ul>
            </nav>
            <div class="profile-link text-center">
                <a href="sair.php" class="btn btn-link text-white btn-block">SAIR</a>
            </div>
        </div>
        <!-- sidebar left ends -->

        <!-- sidebar right start -->
        <div class="sidebar sidebar-right">
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left-close"><i class="material-icons">keyboard_backspace</i></a>
                </div>
                <div class="col center">
                    <a href="#" class="logo">Best Rated</a>
                </div>
            </header>
            <div class="page-content text-white">
                <div class="row mx-0 mt-3">
                    <div class="col">
                        <div class="card bg-none border-0 shadow-none">
                            <div class="card-body userlist_large">
                                <div class="media">
                                    <figure class="avatar avatar-120 rounded-circle my-2">
                                        <img src="img/user1.png" alt="user image">
                                    </figure>
                                    <div class="media-body">
                                        <h4 class="mt-0 text-white">Max Johnsons</h4>
                                        <p class="text-white">VP, Maxartkiller Co. Ltd., India</p>
                                        <h5 class="text-warning my-2">
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											
										</h5>
                                        <div class="mb-0">Overux is HTML template based on Bootstrap 4.1 framework. This html template can be used in various business domains like Manufacturing, inventory, IT, administration etc.</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar right ends -->

        <!-- fullscreen menu start -->
        <div class="modal fade popup-fullmenu" id="fullscreenmenu" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content fullscreen-menu">
                    <div class="modal-header">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="https://maxartkiller.com/profile/" class="block user-fullmenu popup-close">
                            <figure>
                                <img src="img/user1.png" alt="">
                            </figure>
                            <div class="media-content">
                                <h6>John Doe<br><small>India</small></h6>
                            </div>
                        </a>
                        <br>
                        <div class="row mx-0">
                            <div class="col">
                                <div class="menulist">
                                    <ul>
                                        <li>
                                            <a href="index-2.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">poll</i> Dashboard
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="projects.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">add_shopping_cart</i> Projects
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="project-detail.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">filter_none</i> Details
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">person</i> Profile
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="aboutus.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">domain</i> About
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="component.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">pages</i> Component
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mx-0">
                            <div class="col">
                                <a href="login.html" class="rounded btn btn-outline-white text-white popup-close">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <div class="page">
            <form class="searchcontrol">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
                    </div>
                    <input type="email" class="form-control border-0" placeholder="Search2..." aria-label="Username">
                </div>
            </form>
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>
                </div>
                <div class="col center">
                    <a href="home" class="logo">
                       <!-- <figure><img src="img/logo-w.png" alt=""></figure> --> SOS DOS ELEVADORES</a>
                </div>
                <div class="right">
                    <!-- <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a> -->
                </div>
            </header>





            
            <div class="page-content">
                <div class="content-sticky-footer">
                        
                    
                  <?php /// 
                  include "url.php";
                  ?>





</div>
                    

                   
                <div class="footer-wrapper shadow-15">
                    <div class="footer">
                        <div class="row mx-0">
                            <div class="col">
                                Menu
                            </div>
                            <div class="col-7 text-right">
                                
                            </div>
                        </div>
                    </div>
                    <div class="footer dark">
                        <div class="row mx-0">
                            <div class="col  text-center">
                                Copyright 2023 SOS DOS ELEVADORES
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main ends -->


        


    </div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <!-- Cookie jquery file -->
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- sparklines chart jquery file -->
    <script src="vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Circular progress gauge jquery file -->
    <script src="vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Swiper carousel jquery file -->
    <script src="vendor/swiper/js/swiper.min.js"></script>

    <!-- Application main common jquery file -->
    <script src="js/main.js"></script>


    <!-- page specific script -->
    <script>
        $(window).on('load', function() {
            /* sparklines */
            $(".dynamicsparkline").sparkline([5, 6, 7, 2, 0, 4, 2, 5, 6, 7, 2, 0, 4, 2, 4], {
                type: 'bar',
                height: '25',
                barSpacing: 2,
                barColor: '#a9d7fe',
                negBarColor: '#ef4055',
                zeroColor: '#ffffff'
            });

            /* gauge chart circular progress */
            $('.progress_profile1').circleProgress({
                fill: '#169cf1',
                lineCap: 'butt'
            });
            $('.progress_profile2').circleProgress({
                fill: '#f4465e',
                lineCap: 'butt'
            });
            $('.progress_profile4').circleProgress({
                fill: '#ffc000',
                lineCap: 'butt'
            });
            $('.progress_profile3').circleProgress({
                fill: '#00c473',
                lineCap: 'butt'
            });
            $('.progress_profile5').circleProgress({
                fill: '#ffffff',
                lineCap: 'butt'
            });

            /*Swiper carousel */
            var mySwiper = new Swiper('.swiper-container', {
                slidesPerView: 2,
                spaceBetween: 0,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                }
            });
            /* tooltip */
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        });

    </script>

    
</body>


</html>
