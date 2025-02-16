<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QualificationResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'feedback' => $this->feedback,
            'exp_points' => $this->exp_points,
            'created_at' => $this->created_at,
            "skills" => $this->whenLoaded("skills", function () {
                return new SkillCollection($this->skills);
            }),
            'submission' => new SubmissionResource($this->whenLoaded('submission')),
        ];
    }
}
