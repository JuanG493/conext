<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'creator' => $this->whenLoaded("creator", fn() => $this->creator->name),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'level_required' => $this->level_required,
            'status' => $this->status,
        ];
    }
}
