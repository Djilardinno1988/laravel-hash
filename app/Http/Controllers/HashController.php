<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Hash;
use Illuminate\Http\Request;

class HashController extends Controller
{
    public function show(string $hash)
    {
        //Hash::where('hash', $hash)->get();

        return json_encode(['123123']);
    }

    public function store()
    {

    }
}
