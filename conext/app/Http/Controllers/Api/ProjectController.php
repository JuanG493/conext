<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectByCreatorCollection;
use App\Http\Resources\ProjectByCreatorResource;
use App\Http\Resources\ProjectByLevelCollection;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(["creator"])->paginate(5);
        return new ProjectCollection($projects);
    }
    public function projectsGroupByCreator()
    {
        $projects = Project::with(["creator"])
            ->where("status", "published")
            ->get()
            ->groupBy("creator_id");
        return new ProjectByCreatorCollection($projects);
    }

    public function projectsByLevel(int $level)
    {
        $projects = Project::with(["creator"])
            ->where("status", "published")
            ->where('level_required', $level)
            ->get();

        return new ProjectByLevelCollection($projects);
    }

    public function store(CreateProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $project = Project::create($data);
        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        $project->load(["creator"]);
        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $project->update($data);
        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(["El proyecto de ha eliminado exitosamente"], 200);
    }
}
