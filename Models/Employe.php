<?php

class Employe
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
    /**
     *  @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function createVoiture($data)
    {
        // TODO: Implement createVoiture() method.
        $crud = new Crud();
        $res = $crud->insert("voitures",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }

    /** @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function createVoitureImages($data)
    {
        // TODO: Implement createVoitureImages() method.
        $crud = new Crud();
        $res = $crud->insert("galerie_image_voiture",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }


    public function selectVoitureImage($condition)
    {
        // TODO: Implement selectVoitureImage() method.
        $crud = new Crud();
        $response = $crud->selectByFieldWhereOR("galerie_image_voiture",$condition);
        return $response;
    }


    /**
     * @param $data
     * array K_V pour sotocher les data dans lá table
     * @param $condition
     * array K_V comme clause where pour qualifier la requete
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function updateVoiture($data, $condition)
    {
        // TODO: Implement updateVoiture() method.
        $crud = new Crud();
        $update = $crud->update("voitures",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $condition
     * array K_V comme clause where pour qualifier la requete
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function deleteVoiture($condition)
    {
        // TODO: Implement deleteVoiture() method.
        $crud = new Crud();
        $response = $crud->delete("voitures",$condition);
        return $response;

    }

    /**
     * @return bool|array
     * Au cas ou il n'ya pas de data la methode retrun null
     */
    public function selectAllVoiture()
    {
        // TODO: Implement selectAll() method.
        $crud = new Crud();
        $response = $crud->selectAll("voitures");
        return $response;
    }

    public function selectAllContact()
    {
        $crud = new Crud();
        $response = $crud->selectAll("contact");
        return $response;
    }

    /**
     * @param $id_voiture
     * @return array|null
     */
    public function selectOneVoiture($id_voiture)
    {
        // TODO: Implement selectOne() method.
        $crud = new Crud();
        $response = $crud->selectOne("voitures",$id_voiture);
        return $response;
    }



    /**
     * @param $pattern
     * @return bool|array
     */
    public function searchVoiture($pattern)
    {
        // TODO: Implement searchVoiture() method.
        $crud = new Crud();
        $response = $crud->selectWithLike("voitures",$pattern);
        return $response;
    }

    public function selectAllTemoignage()
    {
        // TODO: Implement selectAll() method.
        $crud = new Crud();
        $response = $crud->selectAll("temoignage");
        return $response;
    }

    /**
     * @param $condition
     * @return int
     */
    public function validateTemoignage($condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",array("status","1"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $data
     * @param $condition
     * @return int
     */
    public function updateTemoignage($data, $condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",$data,$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    public function deleteTemoignage($condition)
    {
        $crud = new Crud();
        $response = $crud->delete("temoignage",$condition);
        return $response;

    }


    /**
     * @param $condition
     * @return int
     */
    public function desactivateTemoignage($condition)
    {
        $crud = new Crud();
        $update = $crud->update("temoignage",array("status","0"),$condition);
        if ($update>0){
            return 200;
        }else{
            return 500;
        }
    }

    /**
     * @param $data
     * @return int
     */

    public function createTemoignage($data)
    {
        // TODO: Implement createTemoignage() method.
        $crud = new Crud();
        $res = $crud->insert("temoignage",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }



}