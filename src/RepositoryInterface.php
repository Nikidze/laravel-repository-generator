<?php

namespace Nikidze\RepositoryGenerator;

interface RepositoryInterface
{
    public function all();

    public function trashOnly();

    public function find($id);

    public function findTrash($id);

    public function findBy($column, $value);

    public function recent($limit);

    public function store($data);

    public function update($data, $id);

    public function trash($id);

    public function restore($id);

    public function destroy($id);
}
