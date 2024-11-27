<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::with('page')->paginate(10);
        $pages = Page::all();
        return view('admin.sections.index', compact('sections', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages= Page::all();
        return view('admin.sections.create' , compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'title_en'=>'required',
            'title_ar'=>'required',
            'page_id'=>'required|int',
        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Section');
            return redirect()->route('sections.index');
        }

        Section::create($request->all());
        toastr()->success('Section has been saved successfully!', 'Section');
        return redirect()->route('sections.index');
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
        //
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
        $validator = Validator($request->all(),[
            'title_en'=>'required',
            'title_ar'=>'required',
            'page_id'=>'required|int',
        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Section');
            return redirect()->route('sections.index');
        }

        $section=Section::findOrFail($id);
        $section->update($request->all());
        toastr()->success('Section has been updated successfully!', 'Section');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=Section::findOrFail($id);
        if ($section){
            $section->delete();
            toastr()->success('Section has been Deleted successfully!', 'Section');
            return redirect()->route('sections.index');
        }else{
            toastr()->success('Section has been Deleted Faild!', 'Section');
            return redirect()->route('sections.index');
        }
    }
}
