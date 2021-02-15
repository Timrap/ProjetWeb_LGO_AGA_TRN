<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles . validation';

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
                        <form class="leave-comment" action="index.php?action=login" method="post" >
                            <h2 class="m-text26 p-b-36 p-t-15">
                                Bravo, votre annonce a bien été publiée.
                            </h2>
                            <a href="index.php?action=home"><input type="submit" value="Retourner à la page principale" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4" id="boutoncgu" </a>

                    </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>