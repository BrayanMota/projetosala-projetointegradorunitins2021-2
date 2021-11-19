<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Semester::all();
        return response() -> json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request -> all();
        Semester:: create($inputs);
        return response() -> json([]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Semester:: find($id);
        return response() -> json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Semester:: find($id);
        $inputs = $request -> all();
        $item -> fill($inputs) -> save();
        return response() -> json([]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Semester:: find($id);
        $item -> delete();
        return response() -> json([]);
    }
}
