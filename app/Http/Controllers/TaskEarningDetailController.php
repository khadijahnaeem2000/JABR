<?php

namespace App\Http\Controllers;

use App\Models\TaskEarningDetail;
use Illuminate\Http\Request;

class TaskEarningDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Earnings.TaskEarning');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskEarningDetail $taskEarningDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskEarningDetail $taskEarningDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskEarningDetail $taskEarningDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskEarningDetail $taskEarningDetail)
    {
        //
    }
}
