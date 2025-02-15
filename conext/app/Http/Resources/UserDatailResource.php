<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDatailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'phone_visibility' => (bool) $this->phone_visibility,
            'web' => $this->website,
            'website_visibility' => (bool) $this->website_visibility,
            'total_experience' => $this->total_experience,
            'avatar' => $this->profile_picture,
            'level_id' => $this->level_id,
            "education" => $this->whenLoaded('educationdetails', function () {
                return new EducationaldetailCollection($this->educationdetails);
            }),
            "followers_count" => $this->whenLoaded("followers", fn() => count($this->followers)),
            "followers" => $this->whenLoaded("followers", function () {
                return new FollowersCollection($this->followers);
            }),
            "blogs" => $this->whenLoaded("blogs", function () {
                return $this->blogs->map(function ($item) {
                    return ["title" => $item->title, "status" => $item->status];
                });
            }),
            "portfolios" => $this->whenLoaded("portfolios", function () {
                return $this->portfolios->map(function ($p) {
                    return ["title" => $p->title, "repository" => $p->repository];
                });
            }),
            "post" => $this->whenLoaded("posts", function () {
                return $this->posts->map(function ($p) {
                    return [
                        "created_at" => date_format($p->created_at, "Y-m-d"),
                        "commens" => count($p->comments)
                    ];
                });
            }),
            "experience" => $this->whenLoaded("experiences", function () {
                return $this->experiences->map(function ($e) {
                    return [
                        "job_headline" => $e->job_headline,
                        "type" => $e->type,
                        "start_date" => $e->start_date,
                        "end_date" => $e->end_date ? $e->end_date : "current",
                        "company" => $e->company->company_name
                    ];
                });
            }),
            "skills" => $this->whenLoaded("skills", function () {
                return $this->skills->map(function ($s) {
                    return [
                        "name" => $s->name,
                        "points" => $s->pivot->total_points
                    ];
                });
            }),
        ];
    }
}
