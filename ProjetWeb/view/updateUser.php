<?php
    /**
     * @file      updateUser.php
     */
    
    $title = 'annoncesfaciles . updateUser';
    
    ob_start();
?>

<?php if ($registerErrorMessage != NULL) : ?>
    <head>
        <link rel="stylesheet" href="view/contents/css/PopUp.css">
    </head>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <h2>
                Erreur d'inscription
            </h2>
            <div>
                <?= $registerErrorMessage; ?>
                <input type="submit" value="OK" id="btnClose" class="btnClose">
            </div>
            <br>
        </div>
    </div>
    
    <script src="view/contents/js/PopUp.js"></script>
<?php endif ?>


<div class="container-login100">
    <div class="wrap-login100">
        <form class="login100-form validate-form" action="index.php?action=userManage&userId=<?=$userId ?>" method="post">
                <span class="login100-form-title">
                    Modifier
                </span>
            
            <div class="wrap-input100 validate-input" data-validate="vous devez ajouter votre prénom">
                <input class="input100" type="text" name="inputUserFirstName" placeholder="Prénom"
                       value="<?php if (isset($_POST['inputUserFirstName'])) echo $_POST['inputUserFirstName']; elseif (isset($user['firstName'])) echo $user['firstName']; ?>"/>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </span>
            </div>
    
            <div class="wrap-input100 validate-input" data-validate="vous devez ajouter votre nom">
                <input class="input100" type="text" name="inputUserLastName" placeholder="Nom"
                       value="<?php if (isset($_POST['inputUserLastName'])) echo $_POST['inputUserLastName']; elseif (isset($user['lastName'])) echo $user['lastName']; ?>"/>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </span>
            </div>
            
            <div class="wrap-input100 validate-input" data-validate="une adresse E-mail est obligatoire: ex@abc.xyz">
                <input class="input100" type="email" name="inputUserEmailAddress" placeholder="Adresse email"
                       value="<?php if (isset($_POST['inputUserEmailAddress'])) echo $_POST['inputUserEmailAddress']; elseif (isset($user['mail'])) echo $user['mail']; ?>"/>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            <!--
            <div class="wrap-input100 validate-input" data-validate="un mot de passe est obligatoire">
                <input class="input100" type="password" name="inputUserPsw" placeholder="Mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            
            <div class="wrap-input100 validate-input" data-validate="rentrez le même mot de passe à nouveau">
                <input class="input100" type="password" name="inputUserPswRepeat" placeholder="Mot de passe (vérif)">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
    -->
            <div class="wrap-input100 validate-input" data-validate="Definissez le type d'utilisateur">

                <select class="input100" name="inputUserType" id="choice">
                    <option>Choisir un type</option>
                    <option value=0 <?php if (isset($user['type']) && $user['type'] == 0): ?> selected<?php endif;?>>Utilisateur</option>
                    <!--<option value=1 </?php if (isset($user['type']) && $user['type'] == 1): ?> selected</?php endif;?>>Gestionaire</option>-->
                    <option value=2 <?php if (isset($user['type']) && $user['type'] == 2): ?> selected<?php endif;?>>Administrateur</option>
                </select>
    
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </span>
            </div>
            
            <div>
                <button type="submit" class="login100-form-btn " id="buttonRegister">
                    Modifier
                </button>
            </div>
    </div>
    </form>
</div>
</div>

<!--===============================================================================================-->
<script src="view/contents/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="view/contents/vendor/bootstrap/js/popper.js"></script>
<script src="view/contents/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="view/contents/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="view/contents/vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="view/contents/js/main.js"></script>


<!--   <section class="login_part padding_top">-->

<?php
    $content = ob_get_clean();
    require 'gabarit.php';
?>

