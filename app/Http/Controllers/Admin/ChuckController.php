<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chuck;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chuck as Request;

class ChuckController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vue()
    {
        return view('admin.phrases.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Chuck::all();

        return view('admin.chuck.index')->with(['chucks' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chuck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chuck::create($request->all());

        // TODO: Mensaje para el usuario

        return redirect()->route('chuck.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = Chuck::findOrFail($id);

        return view('admin.chuck.view')->with(['chuck' => $a]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Chuck::findOrFail($id);

        // TODO: Mensaje para el usuario

        return view('admin.chuck.edit')->with(['chuck' => $a]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chuck = Chuck::findOrFail($id);
        $chuck->update($request->all());

        // TODO: Mensaje para el usuario

        return redirect()->route('chuck.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Chuck::findOrFail($id);
        $a->delete();

        // TODO: Mensaje para el usuario

        return redirect()->route('chuck.index');
    }
}
