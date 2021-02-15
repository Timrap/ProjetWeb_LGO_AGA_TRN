<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
                    <li><a href="index.php?action=createad">Mes annonces</a></li>
                    <li><a href="index.php?action=logout">Se déconnecter</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=login">Se connecter</a></li>
                    <li><a href="index.php?action=register">S'inscrire</a></li>
                <?php endif;?>
			</ul>
		</div>
        <?php if (isset($_SESSION['userEmailAddress'])) : ?>
            <div id="userConnected">
                <?=$_SESSION['userEmailAddress']; ?>
            </div>
        <?php endif;?>
	</div>
</div>

<?=$content; ?>
<div id="copyright" class="container">
    <p>&copy; Tout droits résérvés. | Par Luca GATTO, Andreas GRANADA et Timothée RAPIN.</p>
</div>
</body>
</html>
