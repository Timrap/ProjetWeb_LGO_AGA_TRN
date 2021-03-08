<?php
/**
 * Projet                      Project name
 * @file                       articles.php
 * @brief                      File description
 * @author                     Created by Timothée RAPIN
 * Date de création            01.03.2021
 * update                      01.03.2021
 * @version                    0.0
 * @note                       Création du fichier php
 */

$title = 'annoncesfaciles - ';

ob_start();
?>   <!-- Title Page -->
    <div id="page" class="container">
            <div class="title">
                <h2>Articles</h2>
            </div>
    </div>

    <!-- Product -->
    <div class="row">
<?php foreach ($articles as $article) :?>
    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

        <!-- Block2 -->
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                <img src="<?//=$article['picture']; ?>" alt="IMG-PRODUCT">

                <div class="block2-overlay trans-0-4">
                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">

                </a>

                <span class="block2-price m-text6 p-r-5">
                    CHF <?//=$article['price']; ?>.-
                </span>
            </div>
        </div>
    </div>
<?//php endforeach; ?>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>