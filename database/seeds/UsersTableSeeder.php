<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        App\User::create([
//            'branch_id' => '1',
            'job_id' => 1,
            'name' => 'Dummy 1',
            'email' => 'd@g.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
//            'branch_id' => '1',
            'job_id' => 1,
            'name' => 'Dummy 2',
            'email' => 'dd@g.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'name' => 'Mr Mamun Ur Rasid',
            'email' => 'murasid@gmail.com',
            'password' => bcrypt('123456'),
//            'userinfo_id' => 1,
            'job_id' => 2,
//            'userjobinfo_id' => 1,
//            'userpay_id' => 1,
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 1,
            'name' => 'Sandeep Chowdhery',
            'email' => 'schwdhry@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Tanmoon Taz Shetu',
            'email' => 'shetu.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Abu Hasan Shadhin',
            'email' => 'shadhin.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Mst. Rukiea Khatun',
            'email' => 'rukiea.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Md. Faruk Ahmed',
            'email' => 'faruk.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Md. Arif Babu',
            'email' => 'arif.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Md. Fazle Rabbi',
            'email' => 'rabbi.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Siyam Ahmed Nahid',
            'email' => 'siyam.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Sujon Roy',
            'email' => 'sujon.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Rakib',
            'email' => 'rakib.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Al-Amin',
            'email' => 'alamin.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Sajidul Islam Married',
            'email' => 'sajidul.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);
        App\User::create([
            'branch_id' => '1',
            'job_id' => 10,
            'name' => 'Mustafijur Rahman',
            'email' => 'mustafijur.euitsols@gmail.com',
            'password' => bcrypt('123456'),
            'ip_address' => '127.0.0.1',
            'fatal_warning' => 0,
        ]);

    }
}
