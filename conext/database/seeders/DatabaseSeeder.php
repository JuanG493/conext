<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Challenge;
use App\Models\Comment;
use App\Models\Company;
use App\Models\EducationDetail;
use App\Models\Experience;
use App\Models\Follower;
use App\Models\Level;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Project;
use App\Models\School;
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

        $this->call([
            SkillSeeder::class,
            LevelSeeder::class,
            Companyseeder::class,
            SchoolSeeder::class,
        ]);

        User::factory()->create()->create([
            "role" => "admin",
            "name" => "admin",
            "last_name" => "admin",
            "password" => "admin123",
            "email" => "admin@admin",
            "level_id" => 10
        ]);

        User::factory()->count(5)->create([
            "role" => "company",
            "level_id" => 10,
        ]);




        $users = User::factory()->count(5)->create()->each(
            function ($user) {
                $skills = Skill::all();
                // Generar asignaciones de skills con total_points
                $skillData = $skills->random(rand(1, 5))->mapWithKeys(function ($skill) {
                    return [$skill->id => ['total_points' => rand(1, 100)]];
                });

                // Asignar las habilidades con los puntos
                $user->skills()->attach($skillData);

                Blog::factory()->count(2)->create([
                    "user_id" => $user->id
                ]);
                Experience::factory()->count(random_int(1, 5))
                    ->create([
                        "user_id" => $user->id,
                        "company_id" => Company::inRandomOrder()->value('id'),
                    ]);
                EducationDetail::factory()->count(random_int(1, 3))
                    ->create([
                        "school_id" => School::inRandomOrder()->value('id'),
                    ]);
                $posts = Post::factory()->count(random_int(1, 3))->create([
                    "user_id" => $user->id
                ]);
                $posts->each(function ($post) {
                    Comment::factory()->count(random_int(2, 4))->create([
                        "post_id" => $post->id
                    ]);
                });
                Portfolio::factory()->count(2)->create(["user_id" => $user->id]);
            }
        );

        $users->each(function ($user) use ($users) {
            $followers = $users->where('id', '!=', $user->id)->random(random_int(1, 3));

            foreach ($followers as $follower) {
                Follower::factory()->create([
                    'followed_by' => $follower->id,
                    'following' => $user->id,
                ]);
            }
        });

        $userEmpresa = User::where("role", "company")->each();
        $this->command->info("hoasdfoasjdf");




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
