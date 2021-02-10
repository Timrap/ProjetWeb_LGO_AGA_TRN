<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles - home';

ob_start();
?>   <!-- Title Page -->
    <div id="page" class="container">
        <div class="title">
            <h2>Conditions générales d'utilisation</h2>
        </div>

        </div>
        <div class="boxB">
            <p>
                Conditions générales d'utilisation...
            </p>
        </div>
    </div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>