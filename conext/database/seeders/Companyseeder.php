<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class Companyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'Tech Innovators',
                'company_website' => 'https://techinnovators.com',
                'about_company' => 'Tech Innovators is a leading company in AI and cloud computing.',
            ],
            [
                'company_name' => 'Green Energy Corp',
                'company_website' => 'https://greenenergy.com',
                'about_company' => 'A company focused on renewable energy solutions and sustainability.',
            ],
            [
                'company_name' => 'NextGen Software',
                'company_website' => 'https://nextgensoftware.com',
                'about_company' => 'Developing cutting-edge software solutions for businesses worldwide.',
            ],
            [
                'company_name' => 'HealthPlus',
                'company_website' => 'https://healthplus.com',
                'about_company' => 'A healthcare company providing innovative medical solutions.',
            ],
            [
                'company_name' => 'EduSmart',
                'company_website' => 'https://edusmart.com',
                'about_company' => 'Transforming education through smart learning platforms.',
            ],
            [
                'company_name' => 'AutoTech Solutions',
                'company_website' => 'https://autotechsolutions.com',
                'about_company' => 'Pioneering the future of autonomous vehicles and smart transportation.',
            ],
            [
                'company_name' => 'CyberSecure',
                'company_website' => 'https://cybersecure.com',
                'about_company' => 'Providing top-notch cybersecurity services for businesses.',
            ],
            [
                'company_name' => 'FinTech Global',
                'company_website' => 'https://fintechglobal.com',
                'about_company' => 'Revolutionizing financial technology with blockchain and AI.',
            ],
            [
                'company_name' => 'BuildIt Constructions',
                'company_website' => 'https://builditconstructions.com',
                'about_company' => 'Leading the construction industry with sustainable solutions.',
            ],
            [
                'company_name' => 'Foodie Delights',
                'company_website' => 'https://foodiedelights.com',
                'about_company' => 'Bringing gourmet experiences to food lovers worldwide.',
            ],
        ];

        foreach ($companies as $company) {
            $company["slug"] = Str::slug($company["company_name"]);
            Company::create($company);
        }
    }
}
