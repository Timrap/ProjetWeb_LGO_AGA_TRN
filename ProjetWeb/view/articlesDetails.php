<?php
ob_start();
$title = 'annoncesfaciles - articleDetails';
?>

<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    <a href="index.html" class="s-text16">
        Home
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="product.html" class="s-text16">
        Women
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="#" class="s-text16">
        T-Shirt
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <span class="s-text17">
			Boxy T-Shirt with Roll Sleeve Detail
		</span>
</div>

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
        <!-- description -->
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
        <!-- adresse -->
        <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
            <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                Adresse
                <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
            </h5>
            <div class="dropdown-content dis-none p-t-15 p-b-23">
                <p class="s-text8">
                    <?=$article['address'];?>
                </p>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
