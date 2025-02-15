<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LevelUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "level" => $this->level,
            "experience_required" => $this->experience_required,
            "users" => $this->whenLoaded("users", function () {
                return  $this->users->map(function ($u) {
                    return [
                        "name" => $u->name,
                        "username" => $u->username,
                        "experience" => $u->total_experience,
                        "experience_left" => $this->experience_required - $u->total_experience
                    ];
                });
            }),
        ];
    }
}
