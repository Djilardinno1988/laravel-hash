<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreHashRequest;
use App\Http\Resources\HashCollection;
use App\Http\Resources\HashResource;
use App\Services\HashService;
use Illuminate\Http\JsonResponse;

class HashController extends Controller
{
    public function __construct(private HashService $hashService)
    {
    }

    public function store(StoreHashRequest $request): HashResource
    {
        $request->validated();

        return HashResource::make($this->hashService->store($request));
    }

    public function show(string $hash): HashCollection|HashResource|JsonResponse
    {
        return $this->hashService->show($hash);
    }
}
