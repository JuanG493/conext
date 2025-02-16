<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQualificationRequest;
use App\Http\Requests\UpdateQualificationRequest;
use App\Http\Resources\QualificationCollection;
use App\Http\Resources\QualificationResource;
use App\Http\Resources\SkillResource;
use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateQualificationRequest $request)
    {

        $data = $request->validated();
        $qualification = Qualification::create($data);
        $skills = $request->skills;
        foreach ($skills as $skill) {
            $qualification->skills()->attach($skill['id'], ['points' => $skill['points']]);
        };
        $qualification->load(["submission", "submission.project", "skills"]);
        return new QualificationResource($qualification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Qualification $qualification)
    {
        $qualification->load(["submission", "submission.project", "skills"]);
        // $qualification->join("qualification_skill", "qualification_skill.qualification_id", "=", "qualifications.id");
        return new QualificationResource($qualification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQualificationRequest $request, Qualification $qualification)
    {

        $data = $request->validated();
        $qualification->update($data);
        $skills = $request->skills;

        foreach ($skills as $skill) {
            $qualification->skills()
                ->updateExistingPivot($skill['id'], ['points' => $skill['points']]);
        }

        $qualification->load(["submission", "submission.project", "skills"]);
        return new QualificationResource($qualification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qualification $qualification)
    {
        $qualification->delete();
        return response()->json(["Calificacion eliminada exitosamente"], 200);
    }
}
