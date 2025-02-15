<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->first()->creator->id,
            "name" => $this->first()->creator->name,
            "email" => $this->first()->creator->email,
            "phone" => $this->first()->creator->phone_number,
            "website" => $this->first()->creator->website,
            "projects" => $this->map(function ($p) {
                return [
                    "id" => $p->id,
                    'title' => $p->title,
                    'description' => $p->description,
                    'level_required' => $p->level_required,
                    'status' => $p->status,
                ];
            })
        ];
    }
}
