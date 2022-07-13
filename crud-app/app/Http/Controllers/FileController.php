<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $files = File::all();
       return view("files.index")->with('files',$files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view("files.create");
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
            "title"=>"required|min:3",
            "description"=>"required|min:5",
            "file"=>"required|mimes:png,jpg,pdf"
        ]);

        $file =new File;
        $file->title =$request->title;
        $file->description =$request->description;

        $allfileData = $request->file("file");
        $file_Name = $allfileData->getClientOriginalName();
        $allfileData->move(public_path()."/files/".$file_Name);

        $file->file = $file_Name;

        $file->save();
        return redirect()->back()->with('done','Well done file has been created');
    }


    public function show($id)
    {
        $files = File::find($id);
        return view("files.show")->with('files',$files);
    }


    public function edit($id)
    {
        $files = File::find($id);
        return view("files.edit")->with('files',$files);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5",
            "file"=>"required|mimes:png,jpg,pdf"
        ]);

        $file = File::find($id);
        $file->title =$request->title;
        $file->description =$request->description;

        $allfileData = $request->file("file");
        $file_Name = $allfileData->getClientOriginalName();
        $allfileData->move(public_path()."/files/".$file_Name);

        $file->file = $file_Name;

        $file->save();
        return redirect()->back()->with('done','Well done file has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = File::find($id);
        $files->delete();
        return redirect()->back()->with('done','Well done file has been deleted');

    }

    public function download($id){
        $file = File::where("id", "=", $id)->firstOrFail();
        $filepath = public_path()."/files/".$file->file ;
        return response()->download($filepath);
    }
}
