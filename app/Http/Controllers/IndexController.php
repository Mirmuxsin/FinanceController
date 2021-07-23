<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Category;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $records = Record::all();
        $incomes = $records->where('type', 'Incomes');
        $expenses = $records->where('type', 'Expenses');

        $categories = Category::all();
        $categories_incomes = $categories->where('type', 'Incomes');
        $categories_expenses = $categories->where('type', 'Expenses');

        return view('index', [
            'records' => $records,
            'all_incomes' => $incomes->sum('amount'),
            'all_expenses' => $expenses->sum('amount'),
            'categories' => $categories,
            'categories_incomes' => $categories_incomes,
            'categories_expenses' => $categories_expenses
        ]);
    }
}
