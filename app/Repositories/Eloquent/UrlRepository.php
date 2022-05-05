<?php

namespace App\Repositories\Eloquent;

use App\Models\Url;
use App\Repositories\Contracts\IUrlRepository;

class UrlRepository implements IUrlRepository
{
    protected $url;
    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    public function create(array $data)
    {
        return $this->url->create($data);
    }

    public function list()
    {
        return $this->url->with('urlRequests')->paginate();
    }

    public function getAll()
    {
        return $this->url->get();
    }

    public function getByUuid(string $uuid)
    {
        return $this->url->where('uuid', $uuid)->with('urlRequests')->first();
    }

}
