<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Challenge;
use App\Models\Comment;
use App\Models\Company;
use App\Models\EducationDetail;
use App\Models\Experience;
use App\Models\Level;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Database\Factories\LevelFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            SkillSeeder::class,
            LevelSeeder::class
        ]);
        Level::facatory(10)->create();
        User::factory(10)->create();
        Skill::factory(5)->create();
        Challenge::factory(5)->create();
        Project::factory(5)->create();
        Blog::factory(5)->create();
        Post::factory(10)->create();
        Comment::factory(20)->create();
        Portfolio::factory(3)->create();
        EducationDetail::factory(5)->create();
        Experience::factory(5)->create();
        Company::factory(5)->create();

        //---------------------------------------------------------
        // // Crear usuarios
        // $users = User::factory()->count(10)->create();

        // // Crear habilidades
        // $skills = Skill::factory()->count(5)->create();

        // // Crear retos y proyectos
        // $challenges = Challenge::factory()->count(5)->create();
        // $projects = Project::factory()->count(5)->create();

        // // Asignar usuarios a retos y proyectos
        // foreach ($users as $user) {
        //     $user->challenges()->attach(
        //         $challenges->random(rand(1, 3))->pluck('id'),
        //         ['xp_points' => rand(10, 500), 'feedback' => 'Buen desempeño']
        //     );

        //     $user->projects()->attach(
        //         $projects->random(rand(1, 3))->pluck('id'),
        //         ['xp_points' => rand(10, 500), 'feedback' => 'Proyecto exitoso']
        //     );

        //     // Asignar habilidades a retos y proyectos
        //     foreach ($user->challenges as $challenge) {
        //         \App\Models\ChallengeUserSkill::factory()->create([
        //             'user_id' => $user->id,
        //             'challenge_id' => $challenge->id,
        //             'skill_id' => $skills->random()->id,
        //         ]);
        //     }

        //     foreach ($user->projects as $project) {
        //         \App\Models\ProjectUserSkill::factory()->create([
        //             'user_id' => $user->id,
        //             'project_id' => $project->id,
        //             'skill_id' => $skills->random()->id,
        //         ]);
        //     }
        // }
    }
}
