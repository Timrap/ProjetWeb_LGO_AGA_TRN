<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'Rent A Snow - Lost';

ob_start();
?>   <!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(view/content/images/home_slide_11.jpg);">
        <h2 class="l-text2 t-center">
            Erreur
        </h2>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <h2 class="center">Oupsss... on vous a perdu en chemin ;(.</h2>
            </div>
        </div>
    </section>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>