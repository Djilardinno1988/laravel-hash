<?php

namespace App\Services;

use App\Http\Requests\StoreHashRequest;
use App\Http\Resources\HashCollection;
use App\Http\Resources\HashResource;
use App\Models\Hash;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HashService
{
    public function store(StoreHashRequest $request)
    {
        $item = $request->get('item');

        return Hash::create(['item' => $request->get('item'), 'hash' => sha1($item)]);
    }

    public function show(string $hash): HashCollection|HashResource|JsonResponse
    {
        $hash = Hash::where('hash', '=', $hash)->get();

        if (count($hash) <= 1) {
            if (count($hash) > 0) {
                return HashResource::make($hash[0]);
            }
        } else {
            return new HashCollection($hash);
        }

        return response()->json([
            'error' => 'Resource not found',
        ], Response::HTTP_NOT_FOUND);
    }
}
