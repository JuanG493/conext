<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationaldetailResource extends JsonResource
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
            "degree" => $this->degree,
            "field_of_study" => $this->field_of_study,
            "grade" => $this->grade,
            "description" => $this->description,
            "school" => [
                "name" => $this->school->name,
                "website" => $this->school->website
            ]
        ];
    }
}
