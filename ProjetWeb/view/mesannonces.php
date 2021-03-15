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
            <?php foreach ($articles as $article): ?>
                <?php if ($article->userEmail == $_SESSION['userEmailAddress']): ?>
                    <div class="box" id="boxArticle1">
                        <img src="<?=$article->picture; ?>" width="320" height="180" alt="" />
                        <h3><?=$article->title; ?></h3>
                        <p><?=$article->description; ?></p>
                        <p>CHF <?=$article->price; ?> .-</p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>