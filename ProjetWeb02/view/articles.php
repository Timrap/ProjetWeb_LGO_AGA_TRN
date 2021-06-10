<?php
/**
 * Projet                      Project name
 * @file                       articles.php
 * @brief                      File description
 * @author                     Created by Timothée RAPIN
 * Date de création            01.03.2021
 * update                      01.03.2021
 * @version                    0.0
 * @note                       Création du fichier php
 */

$title = 'annoncesfaciles - Articles';

ob_start();
?>
    <div id="page">
        <!--<form action="index.php?action=articles" method="post">-->
            <div class="title">
                <h2>Articles - <?php
                        switch ($categorie["categorie"]){
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
                </h2>
                
                <div class="grid" role="tabpanel">
    
    
                    <?php foreach ($articles as $article): ?>
                        <?php if (isset($article->categorie) && $article->categorie == $categorie["categorie"]): ?>
                            <div>
                                <?php if(is_file($article->picture)) : ?>
                                    <img class="imageProductList" src="<?=$article->picture; ?>" width="320" height="180" alt="IMG-PRODUCT"/>
                                <?php else :?>
                                    <img class="imageProductList" src="view/contents/images/noImages.jpg" width="320" height="180" alt="no image"/>
                                <?php endif;?>
                                <br>
                                <h3><?=$article->title; ?></h3>
                                <br>
                                <p><?=$article->description; ?></p>
                                <br>
                                <p>CHF <?=$article->price; ?> .-</p>
                                <br>
            
                                <!-- Button -->
                                <button type="submit" class="button" name="categorie" value="1">
                                    Voir plus
                                </button>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <!--</form>-->
    </div>
    
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>