<?php

/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles . Login/Logout';

ob_start();
?>
<?php //if ($loginErrorMessage != null) : ?>
<?php if (isset($loginErrorMessage)) : ?>
    <h5><span style="color:red"><?= $loginErrorMessage; ?></span></h5>
<?php endif ?>

    <!-- Title Page -->
    <div id="page" class="container" >


        <!-- content page -->
        <section class="bgwhite p-t-66 p-b-60">
            <div class="container">
                <div class="row">

                <div class="col-md-12 p-b-30" id="formulaire1">

                        <h2 class="m-text26 p-b-36 p-t-15">
                            Menu annonces
                        </h2>
<center>
                    <a href="index.php?action=home"><input type="submit" value="Visionner mes annonces" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4" id="boutonmenuad"</a></a>
                    <br><br>
                    <a href="index.php?action=createad"><input type="submit" value="Insérer une annonce" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4" id="boutonmenuad" </a></a>
</center>








                </div>
            </div>
    </div>
    </section>
    </div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>