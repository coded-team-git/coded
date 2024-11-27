<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Page;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::paginate(10);
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('admin.contents.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'content_en' => 'required',
            'content_ar' => 'required',
            'section_id' => 'required|int',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first(), 'Content');
            return redirect()->route('contents.index');
        }
        $data = $request->except('page_id');
        Content::create($data);
        toastr()->success('Content has been saved successfully!', 'Content');
        return redirect()->route('contents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'content_en' => 'required',
            'content_ar' => 'required',
            'section_id' => 'required|int',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first(), 'Content');
            return redirect()->route('contents.index');
        }
        $data = $request->except('page_id');
        $content = Content::findOrFail($id);
        $content->update($data);
        toastr()->success('Content has been updated successfully!', 'Content');
        return redirect()->route('contents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        if ($content) {
            $content->delete();
            toastr()->success('Content has been Deleted successfully!', 'Content');
            return redirect()->route('contents.index');
        } else {
            toastr()->success('Content has been Deleted Faild!', 'Content');
            return redirect()->route('contents.index');
        }
    }
}
