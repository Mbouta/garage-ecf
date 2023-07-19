<?php
interface Services{
    /*public function createService($data);
    public function updateService($data,$condition);
    public function deleteService($condition);*/
    public function selectAllService();
    public function selectOneService($id_services);
}
