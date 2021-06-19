<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */



ob_start();
$title = 'annoncesfaciles - home';
?>


<div id="contentpagecreat" class="container">

    <a href="#articlesAdministration" class="button">Articles</a>

    <!-- Users -->
    <h2>Utilisateurs</h2>
    <table id="tableAdminUsers" class="table table-striped table-dark tableArticles">
        <thead>
        <tr>
            <th class="tableArticles" onclick="sortTable(0)">Prénom</th>
            <th class="tableArticles" onclick="sortTable(1)">Nom</th>
            <th class="tableArticles" onclick="sortTable(2)">Mail</th>
            <th class="tableArticles" onclick="sortTable(3)">Type</th>
            <th class="tableArticles"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <?php if(isset($users)): ?>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="tableArticles"><?=$user['firstName']; ?></td>
                        <td class="tableArticles"><?=$user['lastName']; ?></td>
                        <td class="tableArticles"><?=$user['mail']; ?></td>
                        <td class="tableArticles">
                            <?php
                                switch ($user['type']){
                                    
                                    case 0:
                                        echo 'Utilisateur';
                                        break;
                                        
                                    case 1:
                                        echo 'Gestionaire';
                                        break;
                                        
                                    case 2:
                                        echo 'Administrateur';
                                        break;
                                        
                                }
                                $user['type'];
                            ?>
                        </td>
                        <td class="tableArticles"><a id="faficon" href="index.php?action=userManage&userId=<?=$user['id']?>"class="fa fa-cogs fa-2x"></a> <a id="faficon" href="index.php?action=userDelete&userId=<?=$user['id']?>" class="fa fa-trash fa-2x"></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- Articles -->
    <h2 id="articlesAdministration">Articles</h2>
    <table class="table table-striped table-dark" class="tableArticles">
        <thead>
        <tr>
            <th class="tableArticles">Catégorie</th>
            <th class="tableArticles">Image</th>
            <th class="tableArticles">Titre</th>
            <th class="tableArticles">Description</th>
            <th class="tableArticles">Prix</th>
            <th class="tableArticles"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php if(isset($articles)): ?>
            <?php foreach ($articles as $article): ?>
            
        <tr class="<?php if (isset($article['enable']) && $article['enable'] == 0){echo "disable";} ?>">
            <td class="tableArticles">
                <?php
                switch ($article['category']){
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
            <td> <?php if(is_file($article['image'])) : ?>
                    <img class="imageProduct" src="<?=$article['image']; ?>" alt="IMG-PRODUCT"/>
                <?php else :?>
                    <img class="imageProduct" src="view/contents/images/pas-image-disponible.png" alt="no image"/>
                <?php endif;?>
            </td>
            <td class="tableArticles"><?=$article['title']; ?></td>
            <td class="tableArticles"> <textarea class="descriptionArea"  readonly> <?=$article['description']; ?></textarea></td>
            <td class="tableArticles"><?=$article['price']; ?> CHF</td>
            <td class="tableArticles"><a id="faficon" href="index.php?action=adManage&articleId=<?=$article['id']?>"class=" fa fa-cogs fa-2x"></a></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

