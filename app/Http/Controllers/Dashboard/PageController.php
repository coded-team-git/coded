<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'name'=>'required',
        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Page');
            return redirect()->route('pages.index');
        }

        Page::create($request->all());
        toastr()->success('Page has been saved successfully!', 'Page');
        return redirect()->route('pages.index');
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
            'name'=>'required',
        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Page');
            return redirect()->route('pages.index');
        }

        $page=Page::findOrFail($id);
        $page->update($request->all());
        toastr()->success('Page has been updated successfully!', 'Page');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::findOrFail($id);
        if ($page){
            $page->delete();
            toastr()->success('Page has been Deleted successfully!', 'Page');
            return redirect()->route('pages.index');
        }else{
            toastr()->success('Page has been Deleted Faild!', 'Page');
            return redirect()->route('pages.index');
        }
    }
}
