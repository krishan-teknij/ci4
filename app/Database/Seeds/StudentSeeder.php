<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $data = [
                'name'  => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('##########'), // Generates a random 10-digit number
            ];

            // Insert data into the students table
            $this->db->table('students')->insert($data);
        }
    }
}
