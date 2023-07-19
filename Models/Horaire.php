<?php
interface Horaire{
    /*public function createHoraire($data);
    public function updateHoraire($data,$condition);
    public function deleteHoraire($condition);*/
    public function selectAllHoraire();
    public function selectOneHoraire($id_services);

    /*public function closeDay($condition);
    public function openDay($condition);*/
}