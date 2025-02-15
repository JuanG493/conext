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
            "creator" => $this->first()->creator->name,
            "id" => $this->first()->creator->id,
            "total_projects" => $this->count(),
            "projects" => $this->map->only(["id", "name", "title", "description", "level_required"])
        ];
    }
}
