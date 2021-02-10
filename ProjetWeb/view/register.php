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
    <h5 xmlns="http://www.w3.org/1999/html"><span style="color:red"><?= $registerErrorMessage; ?></span></h5>
<?php endif ?>
<div id="page" class="container">
    <!-- Title Page -->

    <!--   <section class="login_part padding_top">-->
    <section class="bgwhite p-t-66 p-b-60">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 bg-light">
                    <div class="login_part_form">
                        <div class="login_part_form_iner" id="formulaire1">
                             <h3>S'inscrire</h3>
                            <form class="form" action="index.php?action=register" method="post">
                                <div class="col-md-12 form-group p_star">
                                    <label for="userEmail"><b>Adresse email</b></label><input type="email" class="form-control" placeholder="Adresse email" name="inputUserEmailAddress" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="userPsw"><b>Mot de passe</b></label><input type="password" class="form-control" id="password" name="inputUserPsw" value=""
                                                                                           placeholder="Mot de passe">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="psw-repeat"><b>Vérifier le mot de passe</b></label><input type="password" class="form-control" id="password" name="inputUserPswRepeat" value=""
                                                                                                          placeholder="Mot de passe (vérification)">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" name="CGU">
                                            J'ai lu et j'accepte<a href="https://termsfeed.com/blog/privacy-policies-vs-terms-conditions/"> les conditions générales d'utilisation</a>.
                                        </input>
                                    </div>
                                    <input type="submit" value="Inscrivez-vous" class="flex-c-m size10 bg4 bo-rad-23 hov1 m-text3 trans-0-4">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>

