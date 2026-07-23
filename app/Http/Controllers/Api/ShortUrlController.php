<?php

namespace App\Http\Controllers\Api;

use App\Models\ShortUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Http\Resources\ShortUrlResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $shortUrls = ShortUrl::all();
        return response()->json($shortUrls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request): JsonResponse
    {
        $data = $request->validated();
        
        $isCustom = ! empty($data['short_code']);

        if (! $isCustom) {
            $data['short_code'] = ShortUrl::generateShortCode();
        }

        $data['is_custom'] = $isCustom;
        $shortUrl = ShortUrl::create($data);

        return response()->json($shortUrl, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $shortUrl = ShortUrl::FindOrFail($id);
        
        return response()->json($shortUrl);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShortUrlRequest $request, int $id): JsonResponse
    {
        $shortUrl = ShortUrl::FindorFail($id);

        $data = $request->validated();

        $shortUrl->update($data);

        return response()->json($shortUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): Response
    {
        $shortUrl = ShortUrl::FindOrFail($id);

        $shortUrl->delete();

        return response()->noContent();
    }
}
