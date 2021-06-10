<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=utf-8" />
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        
        <link rel="stylesheet" href="view/contents/css/reset.css">
        <link rel="stylesheet" href="view/contents/css/style.css">
    </head>
    <body>
        <nav>
            <ul>
                <li class="brand">
                    <a href="index.php?action=home">AnnoncesFaciles</a>
                </li>
                <div class="center">
                    <li>
                        <a href="index.php?action=home">Accueil</a>
                    </li>
                    <?php if (isset($_SESSION['userType']) && $_SESSION['userType'] > 1 && isset($_SESSION['userTypeView']) && $_SESSION['userTypeView'] > 1) : ?>
                        <li>
                            <a href="index.php?action=administration">Administration</a>
                        </li>
                    <?php endif;?>
                    <?php if (isset($_SESSION['userEmailAddress'])) : ?>
                        <li>
                            <a href="index.php?action=mesAnnonces">Mes annonces</a>
                        </li>
                    <?php endif;?>
                </div>
                <li class="right scrollingButton">
                    <?php if (isset($_SESSION['userEmailAddress'])) : ?>
                        <!--<img src="view/contents/images/icons/icon-header-01-log.png" alt="connecté"/>-->
                        <?= userName($_SESSION['userEmailAddress']); ?>
                        <ul>
                            <li>
                                <a href="index.php?action=accountManage">Modifier le compte</a>
                            </li>
                            <li>
                                <a href="index.php?action=logout">Se déconnecter</a>
                            </li>
                            <?php if (isset($_SESSION['userType']) && $_SESSION['userType'] > 1) : ?>
                                <li>
                                    Affichage
                                    <ul>
                                        <form action="index.php?action=viewType" method="post">
                                            <li>
                                                <input type="radio" id="viewType1" name="viewType" value="1" onclick="this.form.submit()">
                                                <label id="adminboutons" for="viewType1">Utilisateur</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="viewType2" name="viewType" value="2" onclick="this.form.submit()">
                                                <label id="adminboutons" for="viewType2">Administrateur</label>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php else: ?>
                        <img src="view/contents/images/icons/icon-header-01.png" alt="déconnecté"/>
                        <ul>
                            <li>
                                <a href="index.php?action=accountManage">S'inscrire</a>
                            </li>
                            <li>
                                <a href="index.php?action=login">Se connecter</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
        
        
        
        <?=$content; ?>
        
        
        
        <div id="copyright">
            <p>&copy; Untitled. All rights reserved. | Design by LGO - AGA - TRN.</p>
        </div>
    </body>
</html>