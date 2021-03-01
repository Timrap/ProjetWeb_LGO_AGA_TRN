<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles - Lost';

ob_start();
?>   <!-- Title Page -->
<div id="page" class="container">
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_11.jpg);">
    <h1 class="l-text2 t-center">
        Erreur
    </h1>
</section>
<center>
<!-- content page -->

<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="col-md-12 p-b-30" id="formulaire1">

            <h4 class="m-text26 p-b-36 p-t-15">
                Oups... Nous vous avons perdu en chemin :(.
            </h4>
        <div class="boutonmenuad">
            <a href="index.php?action=home" class="button">Retourner à la page principale</a>
        </div>
    </div>
</section>
</center>

</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
