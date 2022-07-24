<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('admin.statistics.index', [
            'statistics' => Statistic:: all(),
        ]);
    }

    public function create()
    {
        return view('admin.statistics.create' ,[
            'statistic'=> new Statistic(),
        ]);
    }

    public function store(StatisticRequest $request)
    {
        $data = $request->all();
        $statistic = Statistic::create($data);
        return redirect()->route('admin.statistics.index')
            ->with('success' , "Statistic '$statistic->title' Created Successfully");
        
    }


    public function show($id)
    {
        return view('admin.statistics.show',[
            'statistic'=> Statistic::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        return view('admin.statistics.edit', [
            'statistic' => Statistic::findOrFail($id),
        ]);
    }

    public function update(StatisticRequest $request, $id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->update($request->all());

        return redirect()->route('admin.statistics.index')
        ->with('success' , "Statistic '$statistic->title' Updated Successfully");

    }

    public function destroy($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic -> delete();
        return redirect()->route('admin.statistics.index')
            ->with('success' , "Statistic '$statistic->title' Deleted Successfully");
        

    }

}