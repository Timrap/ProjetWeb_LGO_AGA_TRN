<?php
/**
 * @file      login.php
 * @brief     This view is designed to display the login form
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles . Login/Logout';

ob_start();
?>
<?php //if ($loginErrorMessage != null) : ?>
<?php if (isset($loginErrorMessage)) : ?>
    <head>
        <link rel="stylesheet" href="view/contents/css/PopUp.css">
    </head>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <h2>
                Exemple simple de popup
            </h2>
            <div>
                error

            </div>
            <br>
            <input type="submit" value="OK" id="btnClose" class="btnClose">
        </div>
    </div>

    <script src="view/contents/js/PopUp.js"></script>

<?php endif ?>

    <!-- Title Page -->

        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="index.php?action=login" method="post" >
					<span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "une adresse E-mail est obligatoire: ex@abc.xyz">
                        <input class="input100" type="text" name="inputUserEmailAddress" placeholder="Adresse email">
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


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                           Se connecter
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="index.php?action=register">
                            Pas de compte ?
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
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


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>