<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

$title = 'annoncesfaciles - contidions';

ob_start();
?>   <!-- Title Page -->
    <div id="page" class="container">
        <div class="title" id="formulaire1>
            <h2>Conditions générales d'utilisation</h2>




    </div>
        <div class="boxA" id="conditions">
            <h2>
                <br>Prix<br>
                Les prix de ce catalogue sont indiqués en francs suisses, montants nets, TVA comprise et garantis.
                Les articles bénéficiant d'une garantie sont soumis aux conditions de l'offre valable lors de l'achat. La garantie prend effet à la date de livraison de l'article, justifiée par le document d'accompagnement (facture) que nous vous demandons de conserver soigneusement. Ne sont pas couverts : les dommages dus à un mauvais entretien, au non respect du mode d'emploi, ou à une usure normale.
                <br><br>
                Disponibilité<br>
                Notre engagement de livraison est nul en cas de défaillance ou non-respect des délais d’approvisionnement de la part de nos propres fournisseurs, et dans la mesure où cette indisponibilité n’est pas imputable à VOTRE ENTREPRISE. En cas d’indisponibilité d’un produit, nous vous informerons dans les meilleurs délais.
                <br><br>
                Modalités de paiement<br>
                Méthodes de paiement : paiement Paypal.
                <br><br>
                Livraison et transport<br>
                L'envoi des articles disponibles est effectué par poste dans un délai de 5 à 8 jours environ. Une participation de votre part est demandée une seule fois par commande.
                A NOTER : VOTRE ENTREPRISE ne livre pas ses colis en case postale et ne livre aucune marchandise à une clientèle mineure ou sous tutelle, sauf autorisation écrite des parents ou tuteur.
                <br><br>
                Retour ou échange de marchandises<br>
                Les articles doivent être renvoyés intacts et complets dans leur emballage d'origine (avec les étiquettes comportant leurs références), accompagnés du bordereau de livraison, dans un délai de 7 jours après réception de votre colis. Les frais de port liés au retour sont à votre charge. Dans le cas d'une commande échange, les frais de port de votre nouvelle commande vous sont offerts.
                <br><br>
                Garantie légales<br>
                Vérifiez l’état des marchandises livrées sans attendre pour exclure des vices de matière et de fabrication manifestes, ainsi que des dommages dus au transport. Conformément à la loi, vous êtes obligé de nous signaler tout défaut ou anomalie affectant les marchandises livrées pour nous permettre d’y remédier.
                <br><br>
                Protection des données<br>
                Toutes les données à caractère personnel seront considérées comme confidentielles. Les informations nécessaires à la gestion de la commande feront l’objet d’un traitement informatique et peuvent être communiquées à des entreprises associées dans le cadre de la gestion de la commande.
                <br><br>
                Droit applicable et for juridique<br>
                Le droit applicable est le droit Suisse, et tout litige sera traité par le Tribunal d'arrondissement NOM DU DISTRICT  ⁽¹⁾ ​
                <br><br><br>
                ⁽¹⁾
                Le for juridique est pour une personne physique, celui de son domicile et pour une personne morale (entreprise inscrite au registre du commerce), celui de son siège. Cliquez-ici pour trouver le Tribunal d'arrondissement correspondant à votre localité pour la canton de Vaud.
                <br>
            </h2>
        </div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>