<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */



ob_start();
$title = 'annoncesfaciles - home';
?>
   <!-- <div id="page" class="container">

        <<form class="login100-form validate-form" action="index.php?action=articles" method="post">

            <div class="title">
                <h2>Catégories</h2>
            </div>

            <div class="box" id="boxArticle1">
                <img src="view/contents/annonce1-passat/1.jpg" width="320" height="180" alt="" />
                <h3>Voitures</h3>
                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                <button type="submit" class="button" name="article" value="1">
                    Read More
                </button>
            </div>

            <div class="box">
                <img src="view/contents/annonce2-iphone/iphone1.jpg" width="320" height="180" alt="" />
                <h3>Smartphones</h3>
                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                <button type="submit" class="button" name="article" value="2">
                    Read More
                </button>
            </div>



            <div class="box">
                <img src="view/contents/annonce3-montre/montre1.jpg" width="320" height="180" alt="" />
                <h3>Montres</h3>
                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                <button type="submit" class="button" name="article" value="3">
                    Read More
                </button>
            </div>

                <div class="box">
                    <img src="view/contents/annonce4-table/table.jpg" width="320" height="180" alt="" />
                    <h3>Tables</h3>
                    <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                    <button type="submit" class="button" name="article" value="4">
                        Read More
                    </button>
                </div>



                <div class="box">
                    <img src="view/contents/annonce5-ordinateur/ordinateur1.jpg" width="320" height="180" alt="" />
                    <h3>Ordinateurs</h3>
                    <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                    <button type="submit" class="button" name="article" value="5">
                        Read More
                    </button>
                </div>

                <div class="box">
                    <img src="view/contents/annonce6-playstation/playstation1.jpg" width="320" height="180" alt="" />
                    <h3>Consoles</h3>
                    <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                    <button type="submit" class="button" name="article" value="6">
                        Read More
                    </button>
                </div>
    </div>
-->
<div id="page" class="container">
    <form action="index.php?action=articles" method="post">
    <div class="title">
        <h2>Catégories</h2>


        <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
            <div class="row">


                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce1-passat/1.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Véhicule motorisé</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="1">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce2-iphone/iphone1.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Appreil électronique</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="2">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce4-table/table.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Mobilier</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="3">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce3-montre/montre1.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Bijou</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="4">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce5-ordinateur/ordinateur1.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Immobilier</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="5">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="view/contents/annonce6-playstation/playstation1.jpg" width="320" height="180" alt="" />

                            <div class="block2-overlay trans-0-3">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-3">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                </a>
                                <h3>Décoration</h3>
                                <p>Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue rutrum.</p>
                                <div class="block2-btn-addcart w-size1 trans-0-3">
                                    <!-- Button -->
                                    <button type="submit" class="button" name="categorie" value="6">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

