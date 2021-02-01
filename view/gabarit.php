<?php
/**
 * @file      gabarit.php
 * @brief     This view is designed to centralize all common graphical component like header and footer (will be call by all views)
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY & Pascal BENZONANA
 * @version   23-MAY-2020
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=$title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="view/content/images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/content/css/util.css">
    <link rel="stylesheet" type="text/css" href="view/content/css/main.css">
    <!--===============================================================================================-->
    <link rel="script" type"tex
</head>
<body class="animsition">
<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <span class="topbar-child1">
					Livraison gratuite dès 200.-
				</span>

            <div class="topbar-child2">
					<span class="topbar-email">
                        <?php if (isset($_SESSION['userEmailAddress'])) : ?>
                            <?=$_SESSION['userEmailAddress']; ?>
                        <?php endif;?>
					</span>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <img src="view/content/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="index.php">Accueil</a>
                        </li>

                        <li>
                            <a href="index.php?action=displayArticles">Nos snows</a>
                        </li>

                        <?php if (!isset($_SESSION['userEmailAddress']) || (!isset($_GET['action'])) || ((@$_GET['action'] == "logout"))) : ?>
                            <li>
                                <a href="index.php?action=login">Login</a>
                            </li>
                            <li>
                                <a href="index.php?action=register">S'enregistrer</a>
                            </li>
                        <?php else : ?>
                            <?php if (isset($_SESSION['userType'])) : ?>
                                <li>
                                    <a href="index.php?action=articlesAdmin">Gestion</a>
                                </li>
                            <?php endif;?>
                            <li>
                                <a href="index.php?action=logout">Logout</a>
                            </li>
                        <?php endif; ?>


                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

                <?php if (!isset($_SESSION['userEmailAddress']) || (!isset($_GET['action'])) || ((@$_GET['action'] == "logout"))) : ?>
                    <a href="index.php?action=login" class="header-wrapicon1 dis-block">
                        <img src="view/content/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    </a>
                <?php else : ?>
                    <a href="index.php?action=logout" class="header-wrapicon1 dis-block">
                        <img src="view/content/images/icons/icon-header-01-log.png" class="header-icon1" alt="ICON">
                    </a>
                <?php endif;?>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="view/content/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">
							<?php if(isset($_SESSION['cart'])): ?>
                                <?=$_SESSION['cart']->GetNbOfArticles(); ?>
                            <?php else : ?>
                                0
                            <?php endif; ?>
						</span>
                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <?php if(isset($_SESSION['cart'])): ?>
                        <ul class="header-cart-wrapitem">
                                <?php foreach ($_SESSION['cart']->GetItems() as $cartItem) :?>
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="<?= $cartItem->GetImgPath(); ?>" alt="<?= $cartItem->GetArticleId(); ?>" alt="IMG-PRODUCT">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name">
                                                <?=$cartItem->GetQuantity() . "x " . $cartItem->GetArticleId();?>
                                            </a>

                                            <span class="header-cart-item-info">
                                                <?=$cartItem->GetPrice(); ?> .00 CHF
                                            </span>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                        </ul>
                        <div class="header-cart-total">
                            Total: <?=$_SESSION['cart']->GetTotalPrice(); ?> .00 CHF
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="index.php?action=cartDisplay" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Panier
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="index.php?action=checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Commander
                                </a>
                            </div>
                        </div>
                        <?php else : ?>
                        <a href="index.php?action=displayArticles" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">Go Shopping !</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.php" class="logo-mobile">
            <img src="view/content/images/icons/logo.png" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">

                <?php if (!isset($_SESSION['userEmailAddress']) || (!isset($_GET['action'])) || ((@$_GET['action'] == "logout"))) : ?>
                    <a href="index.php?action=login" class="header-wrapicon1 dis-block">
                        <img src="view/content/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    </a>
                <?php else : ?>
                    <a href="index.php?action=logout" class="header-wrapicon1 dis-block">
                        <img src="view/content/images/icons/icon-header-01-log.png" class="header-icon1" alt="ICON">
                    </a>
                <?php endif;?>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="view/content/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON  ">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="view/content/images/item-cart-01.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="view/content/images/item-cart-02.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="view/content/images/item-cart-03.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="index.php?action=cartDisplay" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="index.php?action=checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Livraison gratuite dès 200.-
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <span class="topbar-email">
                            <?php if (isset($_SESSION['userEmailAddress'])) : ?>
                                <?=$_SESSION['userEmailAddress'];?>
                            <?php endif;?>
                    	</span>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.php">Accueil</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.php?action=displayArticles">Nos snows</a>
                </li>

                <?php if (!isset($_SESSION['userEmailAddress']) || (!isset($_GET['action'])) || ((@$_GET['action'] == "logout"))) : ?>
                    <li class="item-menu-mobile">
                        <a href="index.php?action=login">Login</a>
                    </li>
                    <li class="item-menu-mobile">
                        <a href="index.php?action=register">S'enregistrer</a>
                    </li>
                <?php else : ?>
                    <li class="item-menu-mobile">
                        <a href="index.php?action=logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<?=$content; ?>

<!-- Shipping -->
<section class="shipping bgwhite p-t-62 p-b-46">
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Livraison
            </h4>

            <a href="#" class="s-text11 t-center">
                Livraison gratuite dès 200.- de commande
            </a>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                Retour sous 30 jours
            </h4>

            <span class="s-text11 t-center">
					Retour dans un délai de 30 jours pour un échange.
				</span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Jours d'ouverture
            </h4>

            <span class="s-text11 t-center">
					Magasin ouvert du Lundi to Dimanche
				</span>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                UNE VISITE ?
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Venez à notre magasin<br>
                    rue de la Glisse 12, 2704 Sautons <br>ou appelez-nous au (+41) 27 890 12 34
                </p>

                <div class="flex-m p-t-30">
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                    <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                </div>
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Categories
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Burton
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Nidecker
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        K2
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Prior
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Liens
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Recherche
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        À propos de nous
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contactez-nous
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Retours
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Aide
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Suivi
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Retours
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Livraison
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Newsletter
            </h4>

            <form>
                <div class="effect1 w-size9">
                    <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@exemple.com">
                    <span class="effect1-line"></span>
                </div>

                <div class="w-size2 p-t-20">
                    <!-- Button -->
                    <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                        Inscription
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="view/content/images/icons/paypal.png" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="view/content/images/icons/visa.png" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="view/content/images/icons/mastercard.png" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="view/content/images/icons/express.png" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="view/content/images/icons/discover.png" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Copyright © SnowPoint 2020 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="view/content/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="view/content/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="view/content/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script src="view/content/js/main.js"></script>

</body>
</html>
