<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\CompanyUserCollection;
use App\Http\Resources\LevelUserCollection;
use App\Http\Resources\LevelUserResource;
use App\Http\Resources\SchoolUserCollection;
use App\Http\Resources\SchoolUserResource;
use App\Http\Resources\SubmissionCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserDatailResource;
use App\Http\Resources\UserResource;
use App\Models\Company;
use App\Models\Level;
use App\Models\Project;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role('user')
            ->orderby('level_id')
            ->with('level')
            ->paginate(10);
        return new UserCollection($users);
    }
    public function rankingByLevel()
    {
        $users = User::role('user')
            ->with('level')
            ->orderby("level_id", "desc")
            ->take(10)
            ->get();
        return new UserCollection($users);
    }

    public function submissions(User $user)
    {
        $user->load("submissions", "submissions.qualifications", "submissions.qualifications.skills");
        return new SubmissionCollection($user->submissions);
    }

    public function usersByLevel(Level $level)
    {
        $level->load("users");
        return new LevelUserResource($level);
    }

    public function usersBySchools(School $school)
    {
        $users = User::join('educationdetails', 'users.id', '=', 'educationdetails.user_id')
            ->join('schools', "educationdetails.id", "=", "schools.id")
            ->where('schools.id', $school->id)
            ->select('users.*')
            ->get();
        return new SchoolUserCollection($users);
    }
    public function usersWithSkills(Request $request)
    {
        $skills = explode(',', $request->query('skills'));
        $users = User::join('skill_user', 'users.id', '=', 'skill_user.user_id')
            ->join('skills', 'skill_user.skill_id', '=', 'skills.id')
            ->whereIn('skills.name', $skills)
            ->select('users.*')
            ->with("skills")
            ->get();
        return new SchoolUserCollection($users);
    }

    public function usersWorkedCompany(Company $company)
    {
        $users = User::join('experiences', 'users.id', '=', 'experiences.user_id')
            ->join('companies', "companies.id", "=", "experiences.company_id")
            ->where('companies.id', $company->id)
            ->select('users.*')
            ->get();
        return new SchoolUserCollection($users);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data["slug"]  = Str::slug($request->username);
        $data["password"] = bcrypt($request->password);
        $data["level_id"] = 1;
        $user = User::create($data);
        $user->load("level");
        return new UserResource($user);
    }

    public function show(User $user)
    {
        $user->load(
            "educationdetails",
            "followers",
            "blogs",
            "portfolios",
            "posts",
            "experiences",
            "skills"
        );
        return new UserDatailResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->username) {
            $data["slug"] = $request->username;
        }
        $user->update($data);
        return new UserDatailResource($user);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(["El usuario ha eliminado exitosamente"], 200);
    }
}
