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
                        <form class="leave-comment" action="index.php?action=validationAd" method="post" enctype="multipart/form-data">

                            <h2 class="m-text26 p-b-36 p-t-15">
                                Insérer une annonce
                            </h2>

                            <br>

                            <h4>
                                Informations du produit
                            </h4>

                            <br>

                            <!-- liste deroulante -->
                            <h4>
                                <select name="categorie">
                                    <option>Choisir une catégorie</option>
                                    <option value="1">Véhicule Motorisé</option>
                                    <option value="2">Appareil éléctronique</option>
                                    <option value="3">Mobilier</option>
                                    <option value="4">Bijou</option>
                                    <option value="5">Immobilier</option>
                                    <option value="6">Décoration</option>
                                </select>
                            </h4>

                            <!-- champs titre -->
                            <div class="bo4 of-hidden size15 m-b-20" >
                                <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="description" type="text" name="title" placeholder="Titre du produit" required>
                            </div>
                            <br>
                            <!-- champs description -->
                            <div class="bo4 of-hidden size15 m-b-20">
                                <textarea id="description" name="description" cols="50" rows="10" placeholder="Description" required></textarea>
                            </div class="md-12">

                            <br>

                            <!-- champs prix -->
                            <div class="bo4 of-hidden size15 m-b-20">
                                <input class="sizefull s-text7 p-l-22 p-r-22" id="prix" type="number" name="price" placeholder="Prix du produit en CHF" required>
                            </div>
                            <br>
                            <!-- Drag and drop -->


                            <!--<h4>
                                Insertion Images
                            </h4>
                            <link href="view/contents/css/main.css" rel="stylesheet">
                            <div id="drop-area">
                                <form class="my-form">
                                    <input type="file" id="fileElem" name="picture" multiple accept="image/*" onchange="handleFiles(this.files)">
                                    <label class="buttondrop" for="fileElem">Insérer une image</label>
                                </form>
                                <div id="gallery"></div>
                                <progress id="progress-bar" max=100 value=0></progress>
                            </div>
                            <script src="view/contents/js/draganddrop.js"></script>-->


                            <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                            Choisissez votre image : <input name="picture" type="file" accept="image/*" />


                            <br>
                            <h4>
                                Adresse
                            </h4>

                            <!-- champs rue -->
                            <div class="bo4 of-hidden size15 m-b-20">
                                <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="description" type="text" name="street" placeholder="Rue" required>
                            </div>

                            <!-- champs ville, npa -->
                            <div class="bo4 of-hidden size15 m-b-20" >
                                <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="description" type="text" name="city" placeholder="Ville, NPA" required>
                            </div>

                            <br>

                            <div class="boutonmenuad">
                                <button type="submit" class="button">
                                    Valider mon annonce
                                </button>
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