<?php

namespace App\Http\Controllers;

use App\Models\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::latest()->paginate(8);
        return view('fileupload', compact('file'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
        # return view('fileupload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required'
        ]);

        try {
            $name = now()->timestamp . ".{$request->file->getClientOriginalName()}";
            $path = $request->file('file')->storeAs('files', $name, 'public');

            File::create([
                'file' => "/storage/{$path}",
                'title' => request('title')
            ]);

            return redirect('/')
                       ->with('Success', 'Photo Uploaded Successfully!');
        } catch (\Exception $e) {
            return redirect('create')
            ->with('Error', 'Something went wrong while uploading image!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(file $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, file $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(file $file)
    {
        //
    }
}
