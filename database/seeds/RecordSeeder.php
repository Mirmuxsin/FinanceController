<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type' => 'Incomes', 'category' => 'Wage', 'amount' => 100, 'comment' => 'Salary', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Food', 'amount' => 30, 'comment' => 'KFC', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Transport', 'amount' => 10, 'comment' => 'Bus', 'date' => '2021-07-22'],
            ['type' => 'Incomes', 'category' => 'Other income', 'amount' => 600, 'comment' => 'Sold car', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Internet', 'amount' => 25, 'comment' => 'Internet fee', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Other expense', 'amount' => 150, 'comment' => 'Shopping', 'date' => '2021-07-22'],
            ['type' => 'Incomes', 'category' => 'Wage', 'amount' => 100, 'comment' => 'Got wage', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Other expense', 'amount' => 100, 'comment' => 'Credits', 'date' => '2021-07-22'],
            ['type' => 'Expenses', 'category' => 'Entertainment', 'amount' => 40, 'comment' => 'Theater', 'date' => '2021-07-22'],

        ];

        DB::table('records')->insert($data);
    }
}
