<?php
interface AdminUser{
    public function createUser($data);
    public function updateUser($data,$condition);

    public function deleteUser($condition);
    public function selectAllUser();
    public function selectOneUser($id_user);
}