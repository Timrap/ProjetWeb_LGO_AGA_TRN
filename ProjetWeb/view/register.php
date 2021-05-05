<?php
/**
 * @file      register.php
 * @brief     This view is designed to display the register form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles . Register';

ob_start();
?>

<?php if ($registerErrorMessage != null) : ?>
    <head>
        <link rel="stylesheet" href="view/contents/css/PopUp.css">
    </head>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <h2>
                Erreur d'inscription
            </h2>
            <div>
                <?=$registerErrorMessage;?>
                <input type="submit" value="OK" id="btnClose" class="btnClose">
            </div>
            <br>
        </div>
    </div>

    <script src="view/contents/js/PopUp.js"></script>
<?php endif ?>



<div class="container-login100">
    <div class="wrap-login100">
        <form class="login100-form validate-form" action="index.php?action=register" method="post" >
					<span class="login100-form-title">
						<?php if(isset($_SESSION['userEmailAddress'])) echo "Modifier mes informations";
                        else echo "S'inscrire";
                        ?>
					</span>

            <div class="wrap-input100 validate-input" data-validate = "vous devez ajouter votre nom">
                <input class="input100" type="text" name="inputUserLastName" placeholder="Nom" value="<?php if(isset($dataUser['lastName'])) echo $dataUser['lastName']; ?>">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "vous devez ajouter votre prénom">
                <input class="input100" type="text" name="inputUserFirstName" placeholder="Prénom" value="<?php if(isset($dataUser['firstName'])) echo $dataUser['firstName']; ?>">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "une adresse E-mail est obligatoire: ex@abc.xyz">
                <input class="input100" type="email" name="inputUserEmailAddress" placeholder="Adresse email" value="<?php if(isset($dataUser['email'])) echo $dataUser['email']; ?>">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "un mot de passe est obligatoire">
                <input class="input100" type="password" name="inputUserPsw" placeholder="Mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "rentrez le même mot de passe à nouveau">
                <input class="input100" type="password" name="inputUserPswRepeat" placeholder="Mot de passe (vérif)">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
            </div>
            <?php if(!isset($_SESSION['userEmailAddress'])) : ?>
            <div class="col-md-12 form-group">
                <div class="creat_account d-flex align-items-center" id="condition">
                    <div>
                        <input type="checkbox" name="CGU" required>
                        J'ai lu et j'accepte <br><a class="conditiongeneral" href="index.php?action=CGU">Les conditions générales d'utilisation</a>.
                        </input>
                    </div>
                </div>
                <?php endif; ?>

            <div  class="container-login100-form-btn">
                <button  type="submit" class="login100-form-btn">
                    <?php if(isset($_SESSION['userEmailAddress'])) echo "Modifier";
                    else echo "S'inscrire";
                    ?>
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
<script >
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

