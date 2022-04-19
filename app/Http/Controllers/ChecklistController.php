<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;

class ChecklistController extends Controller
{
    public $limit = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/", 'name' => "Page"], ['name' => "Test Page"],
        ];

        $checklists     = Checklist::paginate($this->limit);
        $checklistCount = Checklist::count();

        return view("backend.checklist.index", [
            'breadcrumbs'    => $breadcrumbs,
            'checklists'     => $checklists,
            'checklistCount' => $checklistCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Checklist $checklist)
    {
        return view('backend.checklist.create', ['checklist' => $checklist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChecklistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $request)
    {

        Checklist::create($request->all());
        return redirect()->back()->with('message', 'Your slug was added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {

        return view("backend.checklist.edit", [
            'checklist' => $checklist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChecklistRequest  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChecklistRequest $request, Checklist $checklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('checklist.index')->with('message', 'Slug ' . $checklist->slug . ' deleted');
    }
}
