<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectByLevelCollection;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(["creator"])
            ->where("status", "published")
            ->get()
            ->groupBy("creator_id");
        // dd($projects);

        return new ProjectCollection($projects);
    }
    public function projectsByLevel(int $level)
    {
        $projects = Project::with(["creator"])
            ->where("status", "published")
            ->where('level_required', $level)
            ->get();

        return new ProjectByLevelCollection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
