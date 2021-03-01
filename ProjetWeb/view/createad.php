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
                        <form class="leave-comment" action="index.php?action=validationad" method="post" >
                            <h2 class="m-text26 p-b-36 p-t-15">
                                Insérer une annonce
                            </h2>
                            <div class="bo4 of-hidden size15 m-b-20" >
                          <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="description" type="text" name="title" placeholder="Titre du produit" required>
                            </div>
<br>
                            <div class="bo4 of-hidden size15 m-b-20">
                              <textarea id="description" name="Description" cols="50" rows="10" placeholder="Description" required></textarea>
                            </div class="md-12">
                            <br>
                            <div class="bo4 of-hidden size15 m-b-20">

                                <input class="sizefull s-text7 p-l-22 p-r-22" id="prix" type="number" name="prixduproduit" placeholder="Prix du produit en CHF" required>
<br>
                            </div>

                            <link href="view/contents/css/main.css" rel="stylesheet">
                            <div id="drop-area">
                                <form class="my-form">
                                    <input type="file" id="fileElem" multiple accept="image/*" onchange="handleFiles(this.files)">
                                    <label class="buttondrop" for="fileElem">Insérer une image</label>
                                </form>
                                <div id="gallery"></div>
                                <progress id="progress-bar" max=100 value=0></progress>
                            </div>


                            <script src="view/contents/js/draganddrop.js"></script>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1127496.8797496248!2d8.434422893946673!3d46.70981253475751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478dcf8169abf3b5%3A0xce32c1ad4bdca4f9!2s1400%20Yverdon-les-Bains!5e0!3m2!1sfr!2sch!4v1614585986738!5m2!1sfr!2sch" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                            <div class="boutonmenuad">
                                <a href="index.php?action=validationad" class="button">Valider mon annonces</a>
                            </div>
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