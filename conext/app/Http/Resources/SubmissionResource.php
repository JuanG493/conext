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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
            'solution_text' => $this->solution_text,
            'solution_path' => $this->solution_path,
            'submitted_at' => $this->submitted_at,
            'status' => $this->status,
            'user' => new UserResource($this->whenLoaded('user')),
            'project' => new ProjectResource($this->whenLoaded('project')),
        ];
    }
}
