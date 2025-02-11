<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'JavaScript',
            'Python',
            'Java',
            'C++',
            'C#',
            'PHP',
            'TypeScript',
            'Swift',
            'Kotlin',
            'Go',
            'Ruby',
            'Rust',
            'Dart',
            'SQL',
            'NoSQL',
            'HTML',
            'CSS',
            'SASS',
            'React',
            'Vue.js',
            'Angular',
            'Node.js',
            'Express.js',
            'NestJS',
            'Django',
            'Flask',
            'Spring Boot',
            'Laravel',
            'ASP.NET',
            'GraphQL',
            'REST API',
            'Microservices',
            'Docker',
            'Kubernetes',
            'Terraform',
            'AWS',
            'Azure',
            'Google Cloud',
            'Machine Learning',
            'Deep Learning',
            'Artificial Intelligence',
            'Data Science',
            'Big Data',
            'Cybersecurity',
            'Blockchain',
            'Cryptography',
            'Computer Vision',
            'NLP',
            'Ethical Hacking',
            'Penetration Testing',
            'Linux Administration',
            'Networking',
            'Embedded Systems',
            'IoT',
            'Cloud Computing',
            'DevOps',
            'Software Architecture',
            'Algorithms & Data Structures',
            'Parallel Computing',
            'Quantum Computing',
            'Game Development',
            'AR/VR',
            'Mobile Development',
            'Functional Programming',
            'Object-Oriented Programming',
            'Test-Driven Development',
            'CI/CD',
            'Scrum',
            'Agile',
            'Design Patterns'
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
