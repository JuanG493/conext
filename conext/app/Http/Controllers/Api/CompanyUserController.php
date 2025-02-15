<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyUserCollection;
use App\Http\Resources\ProjectBasicCollection;
use App\Http\Resources\ProjectCollection;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = User::role("company")->pluck('id');
        // dd($companies);

        $t = Project::whereIn("creator_id", $companies)
            ->where('status', "published")
            ->with("creator")
            ->get()
            ->groupBy("creator_id");

        return new CompanyUserCollection($t);
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
    public function show(User $user)
    {

        $t = Project::where("creator_id", $user->id)
            ->orderBy("level_required")
            ->get();

        return new ProjectBasicCollection($t);
    }

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
