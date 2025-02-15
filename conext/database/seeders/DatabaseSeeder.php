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
use App\Models\Qualification;
use App\Models\School;
use App\Models\Skill;
use App\Models\Submission;
use App\Models\User;
use Database\Factories\LevelFactory;
use Database\Factories\SubmissionFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'company']);
        Role::create(['name' => 'user']);

        $this->call([
            SkillSeeder::class,
            LevelSeeder::class,
            Companyseeder::class,
            SchoolSeeder::class,
        ]);

        // Crear usuario admin
        User::factory()->create()->create([
            "name" => "admin",
            "last_name" => "admin",
            "password" => "admin123",
            "email" => "admin@admin",
            "level_id" => 10
        ]);


        // Crear usuarios tipo company
        $empresas =  User::factory()->count(5)->create([
            "level_id" => 10,
            "name" => fn() => fake()->company
        ]);
        $empresas->each(function ($e) {
            $e->assignRole('company');
        });


        $users = User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole("user");

            $skills = Skill::all();
            $skillData = $skills->random(rand(1, 5))->mapWithKeys(function ($skill) {
                return [$skill->id => ['total_points' => rand(1, 100)]];
            });
            $user->skills()->attach($skillData);

            // Crear blogs
            Blog::factory()->count(2)->create([
                "user_id" => $user->id
            ]);

            // Crear experiencias con compañías aleatorias
            $companies = Company::inRandomOrder()->limit(random_int(1, 5))->get();
            Experience::factory()->count(count($companies))->create([
                "user_id" => $user->id,
                "company_id" => function () use ($companies) {
                    return $companies->pop()->id;
                },
            ]);

            // Crear detalles de educación con escuelas aleatorias
            $schools = School::inRandomOrder()->limit(random_int(1, 5))->get();
            EducationDetail::factory()->count(count($schools))->create([
                "user_id" => $user->id,
                "school_id" => function () use ($schools) {
                    return $schools->pop()->id;
                },
            ]);

            // Crear publicaciones
            $posts = Post::factory()->count(random_int(1, 3))->create([
                "user_id" => $user->id
            ]);
            $posts->each(function ($post) {
                Comment::factory()->count(random_int(2, 4))->create([
                    "post_id" => $post->id
                ]);
            });

            // Crear portfolios
            Portfolio::factory()->count(2)->create(["user_id" => $user->id]);
        });

        // Crear seguidores
        $users->each(function ($user) use ($users) {
            $followers = $users->where('id', '!=', $user->id)->random(random_int(1, 3));
            foreach ($followers as $follower) {
                Follower::factory()->create([
                    'followed_by' => $follower->id,
                    'following' => $user->id,
                ]);
            }
        });

        // Crear proyectos para empresas
        User::role("company")->lazy()->each(function ($e) {
            Project::factory()->count(2)->create(["creator_id" => $e->id, "status" => "published"]);
            Project::factory()->count(2)->create(["creator_id" => $e->id, "status" => "draft"]);
            Project::factory()->create(["creator_id" => $e->id, "status" => "archived"]);
        });

        // Crear envíos
        $approved = Submission::factory()->count(rand(5, 10))->create([
            "status" => "approved"
        ]);

        $approved->each(function ($submission) {
            $qualification = Qualification::factory()->create([
                "submission_id" => $submission->id // Asegura que la calificación se relacione con la submission
            ]);

            $skills = Skill::inRandomOrder()->take(rand(2, 5))->pluck('id');

            foreach ($skills as $skillId) {
                $qualification->skills()->attach($skillId, ['points' => rand(5, 20)]);
            }
        });

        Submission::factory()->count(rand(10, 15))->create(
            ["status" => "pending"]
        );
    }
}
