<?php

class Utilisateur
{
    /**
     * @param $email
     * @param $password
     * @return int|string
     * 404 Utilisateur non trouvé
     * admin OR employé (type de compte quand le user est trouve)
     * Active la session dans un tableau user $_SESSION['user]
     */
    public function login($email, $password)
    {
        // Vérifier les informations d'identification dans la base de données
        $crud = new \Crud();
        $user = $crud->selectByField("users",
            array("email"=>$email));
        if ($user){
            $passDecode = base64_decode($user['mot_de_passe']);

            // Vérifier si l'utilisateur existe
            if ($password == $passDecode) {
                // Connexion réussie

//            active la session dans un tableau assoc USER
                session_start();
                unset($user['mot_de_passe']);
                $_SESSION['user'] = $user;

                // Redirection en fonction du type d'utilisateur
                if ($user['type_compte'] === 'admin') {
                    // Redirection pour l'administrateur
                    $response = "admin";
                    return $response;
                    //header('Location: admin_dashboard.php');
                    //exit;
                } elseif ($user['type_compte'] === 'employe') {
                    // Redirection pour l'employé
                    //header('Location: employe_dashboard.php');
                    //exit;
                    $response = "employe";

                    return $response;
                }

            }
        }


        $response = 404;
        return $response;
    }

    /**
     * @return int
     * 200 OK
     * 500 BAD
     */
    public function logout(): int
    {
        // Détruire toutes les variables de session
        session_unset();

        // Détruire la session
        session_destroy();

        // Vérifier si toutes les sessions ont été détruites
        if (session_status() === PHP_SESSION_NONE) {
            $response = 200;
            return $response;
        } else {
            $response = 500;
            return $response;
        }

    }


}