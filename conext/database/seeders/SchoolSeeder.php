<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            ['name' => 'Harvard University', 'location' => 'Cambridge, MA', 'website' => 'https://www.harvard.edu'],
            ['name' => 'Stanford University', 'location' => 'Stanford, CA', 'website' => 'https://www.stanford.edu'],
            ['name' => 'Massachusetts Institute of Technology', 'location' => 'Cambridge, MA', 'website' => 'https://www.mit.edu'],
            ['name' => 'University of Oxford', 'location' => 'Oxford, UK', 'website' => 'https://www.ox.ac.uk'],
            ['name' => 'University of Cambridge', 'location' => 'Cambridge, UK', 'website' => 'https://www.cam.ac.uk'],
            ['name' => 'Yale University', 'location' => 'New Haven, CT', 'website' => 'https://www.yale.edu'],
            ['name' => 'Princeton University', 'location' => 'Princeton, NJ', 'website' => 'https://www.princeton.edu'],
            ['name' => 'Columbia University', 'location' => 'New York, NY', 'website' => 'https://www.columbia.edu'],
            ['name' => 'University of Chicago', 'location' => 'Chicago, IL', 'website' => 'https://www.uchicago.edu'],
            ['name' => 'California Institute of Technology', 'location' => 'Pasadena, CA', 'website' => 'https://www.caltech.edu'],
            ['name' => 'University of Toronto', 'location' => 'Toronto, Canada', 'website' => 'https://www.utoronto.ca'],
            ['name' => 'ETH Zurich', 'location' => 'Zurich, Switzerland', 'website' => 'https://www.ethz.ch'],
            ['name' => 'Imperial College London', 'location' => 'London, UK', 'website' => 'https://www.imperial.ac.uk'],
            ['name' => 'University of Tokyo', 'location' => 'Tokyo, Japan', 'website' => 'https://www.u-tokyo.ac.jp'],
            ['name' => 'Tsinghua University', 'location' => 'Beijing, China', 'website' => 'https://www.tsinghua.edu.cn'],
            ['name' => 'National University of Singapore', 'location' => 'Singapore', 'website' => 'https://www.nus.edu.sg'],
            ['name' => 'University of Melbourne', 'location' => 'Melbourne, Australia', 'website' => 'https://www.unimelb.edu.au'],
            ['name' => 'University of Sydney', 'location' => 'Sydney, Australia', 'website' => 'https://www.sydney.edu.au'],
            ['name' => 'Seoul National University', 'location' => 'Seoul, South Korea', 'website' => 'https://www.snu.ac.kr'],
            ['name' => 'University of Hong Kong', 'location' => 'Hong Kong', 'website' => 'https://www.hku.hk'],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
