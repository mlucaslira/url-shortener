<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            // 'user_id'=> $this->user_id,
            'original_url'=> $this->original_url,
            'short_code'=> $this->short_code,
            // 'title'=> $this->title,
            // 'description'=> $this->description,
            // 'fav_icon'=> $this->fav_icon,
            'is_custom'=> $this->is_custom,
            // 'is_active'=>$this->is_active,
            'clicks'=> $this->clicks,
            'last_clicked_at'=> $this->last_clicked_at,
            // 'redirect_delay'=> $this->redirect_delay,
            // 'expires_at'=>$this->expires_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
