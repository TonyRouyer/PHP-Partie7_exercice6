<?php
    $formError = array();   //déclation du tableau d'erreurs
    $civilityList = array('Monsieur' => 'Mr','Madame' => 'Mme');
    $regexName = '/^([A-Z]?[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]?[a-zÀ-ÖØ-öø-ÿ]+)*$/' ;
    //request traiter les formulaire en get et post
    //si le formulaire est validé
    if (isset($_REQUEST['form1'])) {
        //si civilité n'est pas vide et que civilityr ce trouve dans le tableau
        if (!empty($_REQUEST['civility'])) {
            if (in_array($_REQUEST['civility'], $civilityList)) {
                $civility = htmlspecialchars($_REQUEST['civility']);
            }else {
                $formError['civility'] = 'Une erreur est survenue';
            }
        }else {
            $formError['civility'] = 'veuillez sélectionner une civilitée';
        }

        if (!empty($_REQUEST['firstname'])) {
            //si firstname n'est pas vide et que firstname corespond a la regex
            if (preg_match($regexName, $_REQUEST['firstname'])) {
                $firstname = htmlspecialchars($_REQUEST['firstname']);
            }else {
                $formError['firstname'] = 'Le prenom ne doit pas contenir de chiffre ou caractère spéciaux';
            }
        }else {
            $formError['firstname'] = 'veuillez saisr un prénom';
        }

        if (!empty($_REQUEST['lastname'])) {
            //si lastname n'est pas vide et que lastname corespond a la regex
            if (preg_match($regexName, $_REQUEST['lastname'])) {
                $lastname = htmlspecialchars($_REQUEST['lastname']);
            }else {
                $formError['lastname'] = 'Le nom ne doit pas contenir de chiffre ou caractère spéciaux';
            }
        }else {
            $formError['lastname'] = 'veuillez saisir un nom';
        }
    }