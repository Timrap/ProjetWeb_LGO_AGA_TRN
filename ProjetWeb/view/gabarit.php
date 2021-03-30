<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Porphyrio
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="view/contents/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="view/contents/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!--<link rel="stylesheet" type="text/css" href="view/contents/vendor/bootstrap/css/bootstrap.min.css">-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <!--<link rel="stylesheet" type="text/css" href="view/contents/vendor/animate/animate.css">-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/css/util.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/css/main.css">
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php?action=home">AnnoncesFaciles</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.php?action=home">Accueil</a></li>
                <?php if (isset($_SESSION['userEmailAddress'])) : ?>
                    <li><a href="index.php?action=mesAnnonces">Mes annonces</a></li>
                    <li><a href="index.php?action=logout">Se déconnecter</a></li>
                    <li><a href="index.php?action=accountManage">
                            <img src="view/contents/images/icon-header-01-log.png" alt="connecté"/>
                            <?=userName($_SESSION['userEmailAddress']); ?>
                        </a></li>
                <?php else: ?>
                    <li><a href="index.php?action=login">Se connecter</a></li>
                    <li><a href="index.php?action=accountManage">S'inscrire</a></li>
                    <img src="view/contents/images/icon-header-01.png" alt="déconnecté"/>
                <?php endif;?>
			</ul>
		</div>

	</div>
</div>

<?=$content; ?>

<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
