<?php

namespace App\Repositories\Contracts;

interface IUrlRepository
{
    public function create(array $data);
    public function list();
    public function getAll();
    public function getByUuid(string $uuid);
}
