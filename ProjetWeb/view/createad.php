<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles . createad';

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
                        <form class="leave-comment" action="index.php?action=validationAd" method="post" >
                            <h2 class="m-text26 p-b-36 p-t-15">
                                Insérer une annonce
                            </h2>
                            <div class="bo4 of-hidden size15 m-b-20" >
                          <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="description" type="text" name="title" placeholder="Titre du produit" required>
                            </div>
    <br>
                            <div class="bo4 of-hidden size15 m-b-20">
                              <textarea id="description" name="description" cols="50" rows="10" placeholder="description" required></textarea>
                            </div class="md-12">
                            <br>
                            <div class="bo4 of-hidden size15 m-b-20" >
                                <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="prix" type="number" name="price" placeholder="Prix du produit" required>
                            </div>
                            <br>
                            <input type="submit" value="Valider mon annonces" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4" id="boutoncgu"/>
                            <br>
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