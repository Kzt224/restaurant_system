<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $tables = Table::all();
       return view('admin.table',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tableCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request, Table $table)
    {
        $table->number = $request->table_name;
        $table->status = $request->status;
        $table->save();
        return redirect('/table')->with('message','Table Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('admin.tableEdit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $table->number = $request->table_name;
        $table->save();
        return redirect('/table')->with('message','Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
