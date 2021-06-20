<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

ob_start();
$title = 'annoncesfaciles - articleDetails';
?>

<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */



ob_start();
$title = 'annoncesfaciles - articleDetails';
?>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="slick3">
                    <div class="item-slick3">
                        <div class="wrap-pic-w">
                            <img src="<?=$article['image'];?>" alt="IMG-PRODUCT">
                        </div>
                        <a href="index.php?action=like&id=<?=$article['id']; ?>">
                            <?php if (isset($like[0])) : ?>
                                <img src="view/contents/images/icons/heart-fill.svg">
                            <?php else: ?>
                                <img src="view/contents/images/icons/heart.svg">
                            <?php endif; ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                <?=$article['title'];?>
            </h4>

            <span class="m-text17">
					<?=$article['price'];?> CHF
				</span>

            <p class="s-text8 p-t-10">
                <?=$article['category'];?>
            </p>
            </div>
            <!--  -->
            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Description
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>
                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        <?=$article['description'];?>
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Adresse
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div>


            </div>
        </div>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
