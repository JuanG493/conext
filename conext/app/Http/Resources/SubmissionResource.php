<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => $this->user->name,
            'project_id' => $this->project_id,
            'solution_text' => $this->solution_text,
            'solution_path' => $this->solution_path,
            'submitted_at' => $this->submitted_at,
            'status' => $this->status,
            "qualifications" => $this->whenLoaded("qualifications", function () {
                return $this->qualifications->map(function ($q) {
                    return [
                        "rated_by" => $q->evaluator->name,
                        "feedback" => $q->feedback,
                        "exp_points" => $q->exp_points,
                        "qualification_date" => date_format($q->created_at, 'Y-m-d H:i:s'),
                        "total_poins_skills" => $q->skills->sum(fn($s) => $s->pivot->points),
                        "skills" => $q->skills->map(function ($s) {
                            return [
                                "name" =>  $s->name,
                                "points" => $s->pivot->points
                            ];
                        })

                    ];
                });
            })
        ];
    }
}
