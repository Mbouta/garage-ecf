<?php
interface Voiture{
   /* public function createVoiture($data);
    public function createVoitureImages($data);
    public function updateVoiture($data,$condition);
    public function deleteVoiture($condition);*/
    public function selectAllVoiture();
    public function selectOneVoiture($id_voiture);
    public function selectVoitureImage($condition);

    public function searchVoiture($pattern);
}