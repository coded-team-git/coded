<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use App\Models\Project_Images;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('images')->latest()->paginate(5);
        $services = Service::select(['name_' . App::currentLocale(), 'id'])->get();


        return view('admin.projects.index', compact('projects', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::select(['name_' . App::currentLocale(), 'id'])->get();
        return view('admin.projects.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $validator = Validator($request->all(), [
            'images' => 'required|array',
            'name' => 'required',
            'link' => 'nullable',
            'service_id' => 'required|int',
            'tag' => 'required',
        ]);
        $tag = explode(',', $request->tag);
        $request->merge([
            'tag' => $tag
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first(), 'Project');
            return redirect()->route('projects.index');
        }

        $data = $request->except('images');
        $project = Project::create($data);
        // dd($project);

        $images = [];

        foreach ($request->file('images') as $image) {
            $imageName = 'project_' . rand() . '_' . time() . '_' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/images/project'), $imageName);

            $object = new Project_Images();
            $object->image = $imageName;

            array_push($images, $object);
        }



        $project->images()->saveMany($images);



        toastr()->success('Project has been saved successfully!', 'Project');
        return redirect()->route('projects.index');
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
        $validator = Validator($request->all(), [
            'images' => 'nullable|array',
            'name' => 'required',
            'link' => 'nullable',
            'service_id' => 'required|int',
            'tag' => 'required',
        ]);

        $tag = explode(',', $request->tag);
        $request->merge([
            'tag' => $tag
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first(), 'Project');
            return redirect()->route('projects.index');
        }


        $project = Project::findOrFail($id);
        $data = $request->except('images');
        $project->update($data);





        if ($request->hasFile('images')) {
            $images = [];

            $old_images = Project_Images::where('project_id', $project->id)->get();

            foreach ($old_images as $old_image) {

                File::delete(public_path('upload/images/project/' . $old_image->image));
                $old_image->delete();
            }

            foreach ($request->file('images') as $image) {
                $imageName = 'project_' . rand() . '_' . time() . '_' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/images/project'), $imageName);
                $object = new Project_Images(['image' => $imageName]);
                array_push($images, $object);
            }

            $project->images()->saveMany($images);
        }







        toastr()->success('Project has been updated successfully!', 'Project');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project) {
            $old_images = Project_Images::where('project_id', $project->id)->get();

            foreach ($old_images as $old_image) {

                File::delete(public_path('upload/images/project/' . $old_image->image));
            }
            $project->delete();
            toastr()->success('Project has been Deleted successfully!', 'Project');
            return redirect()->route('projects.index');
        } else {
            toastr()->success('Project has been Deleted Faild!', 'Project');
            return redirect()->route('projects.index');
        }
    }
}
