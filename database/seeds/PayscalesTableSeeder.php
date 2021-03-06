<?php

use Illuminate\Database\Seeder;

class PayscalesTableSeeder extends Seeder
{

    public function run()
    {
        App\Payscale::create([
            'title' => 'Pay Scale 1',
            'pay' => 1,
            'compensation' => 1,
            'benefit' => 1,
            'benefit_detail' => 'Na',
            'family_support' => 1,
            'family_support_detail' => 'Na',
        ]);
        App\Payscale::create([
            'title' => 'Pay Scale 2',
            'pay' => 1,
            'compensation' => 1,
            'benefit' => 1,
            'benefit_detail' => 'Na',
            'family_support' => 1,
            'family_support_detail' => 'Na',
        ]);
        App\Payscale::create([
            'title' => 'Pay Scale 3',
            'pay' => 1,
            'compensation' => 1,
            'benefit' => 1,
            'benefit_detail' => 'Na',
            'family_support' => 1,
            'family_support_detail' => 'Na',
        ]);
    }
}
