<?php


namespace App\infrastructure;


interface IBaseRepository
{

    public function getAll();
    public function find($id);
    public function create(array $fields);
    public function update($id,array $fields);
    public function delete($id);

}