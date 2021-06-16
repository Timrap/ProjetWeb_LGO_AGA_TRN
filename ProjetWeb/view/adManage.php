<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

if (isset($article)){
    $title = "annoncesfaciles . Modification d'un article";
}
else{
    $title = "annoncesfaciles . Création d'un article";
}

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
                    <form class="leave-comment" action="index.php?action=adValidation&articleId=<?php if (isset($article['id']))echo $article['id']; ?>" method="post" enctype="multipart/form-data">

                        <h2 class="m-text26 p-b-36 p-t-15">
                            <?php if (isset($article)){
                            echo "Modifier mon annonce";
                            }
                            else{
                            echo "Créer une annonce";
                            } ?>
                        </h2>
                        <br>
                        <!-- champs titre -->
                        <h4>
                            Titre
                        </h4>
                        <div class="bo4 of-hidden size15 m-b-20" >
                            <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="titre" type="text" name="title" value="<?php if(isset($article['title'])) echo $article['title']; ?>" placeholder="Titre" >
                        </div>
                        <br>
                        <h4>
                            Catégorie
                        </h4>
                        <br>
                        <!-- liste deroulante -->
                        <h4>
                            <select name="category" id="choice">
                                <option>Choisir une catégorie</option>
                                <option value="1" <?php if (isset($article['category']) && $article['category'] == 1): ?> selected<?php endif;?>>Véhicule Motorisé</option>
                                <option value="2" <?php if (isset($article['category']) && $article['category'] == 2): ?> selected<?php endif;?>>Appareil éléctronique</option>
                                <option value="3" <?php if (isset($article['category']) && $article['category'] == 3): ?> selected<?php endif;?>>Mobilier</option>
                                <option value="4" <?php if (isset($article['category']) && $article['category'] == 4): ?> selected<?php endif;?>>Bijou</option>
                                <option value="5" <?php if (isset($article['category']) && $article['category'] == 5): ?> selected<?php endif;?>>Immobilier</option>
                            </select>
                        </h4>
                        <br>
                        <h4>
                            Description
                        </h4>
                        <br>
                        <!-- champs description -->
                        <div class="bo4 of-hidden size15 m-b-20">
                            <textarea id="description" name="description" placeholder="Description" required><?php if (isset($article['description']))echo $article['description'] ?></textarea>
                        </div class="md-12">
                        <br>

                        <h4>
                            Prix (CHF)
                        </h4>
                        <br>
                        <!-- champs prix -->
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" id="prix" type="number" name="price" value="<?php if (isset($article['price']))echo $article['price'] ?>" placeholder="Prix du produit en CHF" >
                        </div>
                        <br>
                        <!-- Drag and drop -->
                        <!--

                                                    <h4>
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
                        <h4>
                            Images
                        </h4>
                        <br>
                        <div id="picture">
                            <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                            Choisissez votre image : <input name="image" type="file" accept="image/*">
                            <img src="<?php if (isset($article['image']))echo $article['image']?>">

                            <!--Choisissez votre image : <input name="picture" type="file" accept="image/*" />-->
                        </div>
                        <br><br>
                        <h4>
                            Adresse
                        </h4>
                        <!-- champs rue -->
                        <div class="bo4 of-hidden size15 m-b-20">
                            <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="Rue" type="text" name="street" value="<?php if (isset($article['street']))echo $article['street'] ?>" placeholder="Rue" >
                        </div>

                        <!-- champs ville, npa -->
                        <div class="bo4 of-hidden size15 m-b-20" >
                            <br> <input class="sizefull s-text7 p-l-22 p-r-22" id="Npa" type="text" name="city" value="<?php if (isset($article['city']))echo $article['city'] ?>" placeholder="Ville, NPA" >
                        </div>

                        <br>

                        <div class="boutonmenuad">
                            <button type="submit" class="button">
                                Valider les modifications
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
