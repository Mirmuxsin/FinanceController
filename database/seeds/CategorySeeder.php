<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Wage', 'type' => 'Incomes'],
            ['name' => 'Other income', 'type' => 'Incomes'],
            ['name' => 'Food', 'type' => 'Expenses'],
            ['name' => 'Transport', 'type' => 'Expenses'],
            ['name' => 'Mobile connection', 'type' => 'Expenses'],
            ['name' => 'Entertainment', 'type' => 'Expenses'],
            ['name' => 'Other expense', 'type' => 'Expenses'],
        ];

        DB::table('categories')->insert($data);
    }
}
