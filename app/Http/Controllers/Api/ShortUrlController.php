<?php

namespace App\Http\Controllers\Api;

use App\Models\ShortUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ShortUrlResource;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(['endpoint' => 'index']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): JsonResponse
    {
        return response()->json(['endpoint' => 'store']);
    }

    /**
     * Display the specified resource.
     */
    public function show(): JsonResponse
    {
        return response()->json(['endpoint' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): JsonResponse
    {
        return response()->json(['endpoint' => 'update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): JsonResponse
    {
        return response()->json(['endpoint' => 'destroy']);
    }
}
