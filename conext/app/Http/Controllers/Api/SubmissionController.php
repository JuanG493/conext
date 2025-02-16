<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubmissionRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Http\Resources\SubmissionCollection;
use App\Http\Resources\SubmissionResource;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{

    public function store(CreateSubmissionRequest $request)
    {
        $submission = Submission::create($request->validated());
        return new SubmissionResource($submission);
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        $submission->load(["user", "project"]);
        return new SubmissionResource($submission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        $submission->update($request->validated());
        return new SubmissionResource($submission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();
        return response()->json("envio eliminado correctamente", 200);
    }
}
