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
    <div id="page" class="container">
        <div class="boxA" >
            <div class="box" id="boxArticle1">
                <table>
                    <thead>
                        <tr>
                            <td>Catégorie</td>
                            <td>Image</td>
                            <td>Titre</td>
                            <td>Description</td>
                            <td>Prix (CHF)</td>
                            <td><a href="index.php?action=createAd">Ajouter</a></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <?php if ($article->userEmail == $_SESSION['userEmailAddress']): ?>
                                <tr>
                                    <td>
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
                                    <td><img src="<?=$article->picture; ?>" width="100" alt="" /></td>
                                    <td><?=$article->title; ?></td>
                                    <td><?=$article->description; ?></td>
                                    <td><?=$article->price; ?></td>
                                    <td>
                                        <a href="index.php?action=articleModify">Modifier</a>
                                        <a href="index.php?action=articleDelete">Supprimer</a>
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