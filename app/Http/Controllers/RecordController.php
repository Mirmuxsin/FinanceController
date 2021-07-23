<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->sortBy('type');
        $records = Record::paginate(5);
        return view('records.index', compact('categories', 'records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type',
            'category',
            'amount',
            'comment',
            'date'
        ]);

        $record = new Record;
        $record->category = $request->category;
        $record->type = $request->type;
        $record->amount = $request->amount;
        $record->comment = $request->comment;
        $record->date = $request->date;
        $record->save();

        $categories = Category::all()->sortBy('type');
        $records = Record::all();
        return view('records.index', compact('categories', 'records'))->
            with('msg','Product has been added')->paginate(5);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->sortBy('type');
        $record = Record::find($id);
        return view('records.edit', compact('record', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type',
            'category',
            'amount',
            'comment',
            'date'
        ]);

        $record = Record::find($id);
        $record->category = $request->category;
        $record->type = $request->type;
        $record->amount = $request->amount;
        $record->comment = $request->comment;
        $record->date = $request->date;
        $record->save();

        return redirect('/records')->with('msg', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete the product
        Record::destroy($id);

        // Redirect back
        return redirect('records')->with('msg','Product has been deleted');
    }
}
