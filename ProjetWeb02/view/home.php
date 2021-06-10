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
    
    <div id="page">
        <form action="index.php?action=articles" method="post">
            <h2>Catégories</h2>
            
            <div class="grid" role="tabpanel">
                
                <!-- Véhicule motorisé -->
                <div>
                    <img src="view/contents/images/categories/vehiculeMotorise.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Véhicule motorisé</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
                    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="1">
                        Voir plus
                    </button>
                </div>

                <!-- Appreil électronique -->
                <div>
                    <img src="view/contents/images/categories/appreilElectronique.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Appreil électronique</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="2">
                        Voir plus
                    </button>
                </div>

                <!-- Mobilier -->
                <div>
                    <img src="view/contents/images/categories/mobilier.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Mobilier</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="3">
                        Voir plus
                    </button>
                </div>

                <!-- Bijou -->
                <div>
                    <img src="view/contents/images/categories/bijou.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Bijou</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="4">
                        Voir plus
                    </button>
                </div>

                <!-- Immobilier -->
                <div>
                    <img src="view/contents/images/categories/immobilier.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Immobilier</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="5">
                        Voir plus
                    </button>
                </div>

                <!-- Décoration -->
                <div>
                    <img src="view/contents/images/categories/decoration.jpg" width="320" height="180"
                         alt=""/>
                    <br>
                    <h3>Décoration</h3>
                    <br>
                    <p>Découvrez tous les articles de cette catégorie.</p>
                    <br>
    
                    <!-- Button -->
                    <button type="submit" class="button" name="categorie" value="6">
                        Voir plus
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php
    $content = ob_get_clean();
    require 'gabarit.php';
?>