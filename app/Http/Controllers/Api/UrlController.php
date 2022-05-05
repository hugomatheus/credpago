<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateUrlRequest;
use App\Services\UrlService;

class UrlController extends Controller
{
    protected $urlService;
    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function create(CreateUrlRequest $request)
    {
        return $this->urlService->create($request->all());
    }

    public function list()
    {
        return $this->urlService->list();
    }

    public function getByUuid($uuid)
    {
        return $this->urlService->getByUuid($uuid);
    }
}
