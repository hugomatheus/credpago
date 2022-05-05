<?php

namespace App\Services;

use App\Repositories\Contracts\IUrlRepository;

class UrlService
{
    protected $urlRepository;
    public function __construct(IUrlRepository $urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    public function create(array $data)
    {
        return $this->urlRepository->create($data);
    }

    public function list()
    {
        return $this->urlRepository->list();
    }

    public function getByUuid(string $uuid)
    {
        return $this->urlRepository->getByUuid($uuid);
    }
}
