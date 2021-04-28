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
        <div class="boxA" >
            <div class="box" id="boxArticle1">
                <table>
                    <thead>
                        <tr>
                            <td class="productdetail">Catégorie</td>
                            <td class="productdetail">Image</td>
                            <td class="productdetail">Titre</td>
                            <td class="productdetail">Description</td>
                            <td class="productdetail">Prix</td>
                            <td class="productdetail"><a  href="index.php?action=adManage&articleId="> <button class="button"> Ajouter</button></a></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
                    <tbody>
                    <?php if(isset($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <?php if (isset($article->userEmail) && $article->userEmail == $_SESSION['userEmailAddress']): ?>
                                <tr>
                                    <td class="product">
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
                                    <td class="product"><img src="<?=$article->picture; ?>" width="100" alt="" /></td>
                                    <td class="product"><?=$article->title; ?></td>
                                    <td class="product"><?=$article->description; ?></td>
                                    <td class="product"><?=$article->price; ?> CHF</td>
                                    <td class="product">
                                        <a id="faficon" href="index.php?action=adManage&articleId=<?=$article->id?>" class=" fa fa-cogs fa-2x"></a>
                                        <br>
                                        <br>
                                        <a id="faficon" href="index.php?action=articleDelete&articleId=<?=$article->id?>" class=" fa fa-trash fa-2x"></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>