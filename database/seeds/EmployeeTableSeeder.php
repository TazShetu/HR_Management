<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;

class EmployeeTableSeeder extends Seeder
{

    public function run()
    {
        $users = User::all();
        foreach ($users as $i => $u){
            if ($i > 1){
                Employee::create([
                    'user_id' => $u->id,
                    'employeeType_id' => '1',
                    'religion_id' => '1',
                    'dob' => '1990-10-10',
                    'FathersName' => 'NA',
                    'MothersName' => 'NA',
                    'mobile' => 'NA',
                    'nationality' => 'Bangladeshi',
                    'about_me' => 'NA',
                    'address' => 'NA',
                    'education' => 'NA',
                    'employment' => 'NA',
                    'skills' => 'NA',
                    'languages' => 'NA',
                    'reference' => 'NA',
                ]);
            }
        }

        App\Incrementpolicy::create([
            'below' => '10',
            'increment_1' => '5',
            'above_1' => '10',
            'increment_2' => '10',
            'above_2' => '20',
            'increment_3' => '20',
            'increment_max' => '30',
        ]);
    }
}
