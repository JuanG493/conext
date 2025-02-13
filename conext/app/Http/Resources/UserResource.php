<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'number' => $this->phone_number,
            'url' => $this->website,
            'level' => $this->whenLoaded('level', function () {
                return  $this->level->id;
            }),
            'level experience' => $this->total_experience,
            'experience left' => $this->whenLoaded('level', function () {
                return  $this->level->experience_required - $this->total_experience;
            }),

        ];
    }
}
