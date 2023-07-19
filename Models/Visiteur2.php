<?php

class Visiteur implements Temoignage,Horaire,Voiture,Services
{

    /**
     * @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
     */
    public function contactAdmin($data){
        $crud = new Crud();
        $res = $crud->insert("contact",$data);
        if ($res>0){
            return 200;
        }
        return 500;
    }

    /**
     * @param $data
     * array K_V pour sotocher les data dans lá table
     * @return int
     * 200 insertion OK
     * 500 BAD
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

     public function selectAllTemoignage()
    {
        // TODO: Implement selectAll() method.
        $crud = new Crud();
        $response = $crud->selectAll("temoignage");
        return $response;
    }

    public function selectValidateTemoignage()
    {
        // TODO: Implement selectOneTemoignage() method.
        $fields = array(
            'status' => '1'
        );
        $crud = new Crud();
        $response = $crud->selectByFieldWhereOR("temoignage", $fields);
        return $response;
    }

    public function selectAllHoraire()
    {
        // TODO: Implement selectAllHoraire() method.
        $crud = new Crud();
        $response = $crud->selectAll("horaires");
        return $response;
    }

    public function selectOneHoraire($id_horaire)
    {
        // TODO: Implement selectOneHoraire() method.
        $crud = new Crud();
        $response = $crud->selectOne("horaires",$id_horaire);
        return $response;
    }

    public function selectAllVoiture()
    {
        // TODO: Implement selectAllVoiture() method.
        $crud = new Crud();
        $response = $crud->selectAll("voitures");
        return $response;
    }

    public function selectOneVoiture($id_voiture)
    {
        // TODO: Implement selectOneVoiture() method.
        $crud = new Crud();
        $response = $crud->selectOne("voitures",$id_voiture);
        return $response;
    }

    public function selectVoitureImage($condition)
    {
        // TODO: Implement selectVoitureImage() method.
        $crud = new Crud();
        $response = $crud->selectByFieldWhereOR("galerie_image_voiture",$condition);
        return $response;
    }

    public function searchVoiture($pattern)
    {
        // TODO: Implement searchVoiture() method.
        $crud = new Crud();
        $response = $crud->selectWithLike("voitures",$pattern);
        return $response;
    }

    public function filterByPriceVoiture($prixMin,$prixMax){
        $crud = new Crud();
        $response = $crud->selectAll("voitures");

        if ($prixMin == "" AND $prixMax == ""){
            return $response;
        }
        // Tableau pour stocker les voitures correspondantes au critère de prix
        $voituresFiltrees = array();
        foreach ($response as $voiture) {
            $prixVoiture = $voiture['prix'];

            if ($prixVoiture >= $prixMin && $prixVoiture <= $prixMax) {
                // La voiture se trouve dans la fourchette de prix
                $voituresFiltrees[] = $voiture;
            }
        }
        return $voituresFiltrees;
    }

    public function selectAllService()
    {
        // TODO: Implement selectAllService() method.
        $crud = new Crud();
        $response = $crud->selectAll("services");
        return $response;
    }

    public function selectOneService($id_services)
    {
        // TODO: Implement selectOneService() method.
        $crud = new Crud();
        $response = $crud->selectOne("services",$id_services);
        return $response;
    }
}