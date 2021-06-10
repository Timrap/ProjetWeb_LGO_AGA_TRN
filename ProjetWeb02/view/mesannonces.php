<?php
/**
 * Projet                      Project name
 * @file                       mesannonces.php
 * @brief                      File description
 * @author                     Created by Timothée RAPIN
 * Date de création            15.03.2021
 * update                      15.03.2021
 * @version                    0.0
 * @note                       Création du fichier php
 */

$title = 'annoncesfaciles - Mes annonces';

ob_start();
?>
    <!-- Title Page -->
    <div id="page" class="container">
        <div class="title">
            <h2>Mes annonces</h2>
        </div>
    </div>

    <!-- Product -->
    <div id="contentpagecreat" class="container">

        <table class="table table-striped table-dark" class="tableArticles">
            <thead>
            <tr>
                <th class="tableArticles">Catégorie</th>
                <th class="tableArticles">Image</th>
                <th class="tableArticles">Titre</th>
                <th class="tableArticles">Description</th>
                <th class="tableArticles">Prix</th>
                <th class="tableArticles"><a  href="index.php?action=adManage&articleId="> <button class="button"> Ajouter</button></a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php if(isset($articles)): ?>
                <?php foreach ($articles as $article): ?>
                <?php if (isset($article->userEmail) && $article->userEmail == $_SESSION['userEmailAddress']): ?>
            <tr>
                <td class="tableArticles">
                    <?php
                    switch ($article->categorie){
                        case 1:
                            echo "Véhicule motorisé";
                            break;
                        case 2:
                            echo "Appreil électronique";
                            break;
                        case 3:
                            echo "Mobilier";
                            break;
                        case 4:
                            echo "Bijou";
                            break;
                        case 5:
                            echo "Immobilier";
                            break;
                        case 6:
                            echo "Décoration";
                            break;
                    }
                    ?>
                <td> <?php if(is_file($article->picture)) : ?>
                        <img class="imageProduct" src="<?=$article->picture; ?>" alt="IMG-PRODUCT"/>
                    <?php else :?>
                    <img class="imageProduct" src="view/contents/images/pas-image-disponible.png" alt="no image"/>
                <?php endif;?>
                </td>
                <td class="tableArticles"><?=$article->title; ?></td>
                <td class="tableArticles"> <textarea class="descriptionArea"  readonly> <?=$article->description; ?></textarea></td>
                <td class="tableArticles"><?=$article->price; ?> CHF</td>
                <td class="tableArticles"><a id="faficon" href="index.php?action=adManage&articleId=<?=$article->id?>"class=" fa fa-cogs fa-2x"></a> <a id="faficon" href="index.php?action=articleDelete&articleId=<?=$article->id?>" class=" fa fa-trash fa-2x"></a></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>