<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RedirectController extends Controller
{
    public function handleRedirect(Request $request, string $short_code)
    {
        // "Código Recebido no Controller: {$short_code}"
        $shortUrl = ShortUrl::where('short_code', $short_code)->firstOrFail();

        if (! $shortUrl->is_active) {
            abort(403);
        }
        if (
            $shortUrl->expires_at &&
            $shortUrl->expires_at->isPast()
        ) {
            abort(419);
        }

        $clickedAt = now();
        DB::transaction(function () use ($shortUrl, $request, $clickedAt){
            
            $shortUrl->clicks()->create([
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer' => $request->headers->get('referer'),
                'clicked_at' => $clickedAt,
                ]);
                
                $shortUrl->increment('clicks');
                $shortUrl->update([
                    'last_clicked_at' => $clickedAt,
                    ]);
        });



        return redirect()->away($shortUrl->original_url);

        /* Quando implementarmos o react, retornaremos um json para o react consumir
        return response()->json([
            'original_url' => $shortUrl->original_url,
            'redirect_delay' => $shortUrl->redirect_delay,
            'title' => $shortUrl->title,
            'description' => $shortUrl->description,
        ]);
         */
    }
}
