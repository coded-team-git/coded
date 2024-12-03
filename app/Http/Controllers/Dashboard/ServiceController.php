<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::latest()->paginate(5);

        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'image_path'=>'required|image',


        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Service');
            return redirect()->route('services.index');
        }
        $imageName='service_'.rand().'_'.time().'_'.$request->file('image_path')->getClientOriginalName();
        $request->file('image_path')->move(public_path('upload/images/services'),$imageName);

        $request->merge([
            'image'=>$imageName
        ]);
        $data=$request->except('image_path');
        $service = Service::create($data);


        toastr()->success('Service has been saved successfully!', 'Service');
        return redirect()->route('services.index');
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
            'name_en'=>'required',
            'name_ar'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'image_path'=>'nullable|image',


        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Service');
            return redirect()->route('services.index');
        }

        $service=Service::findOrFail($id);
        $imageName=$service->image;
        if($request->hasFile('image_path')){
            File::delete(public_path('upload/images/services/'.$service->image));
            $imageName='service_'.rand().'_'.time().'_'.$request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('upload/images/services'),$imageName);
        }

        $request->merge([
            'image'=>$imageName
        ]);
        $data=$request->except('image_path');
        $service->update($data);
        toastr()->success('Data has been updated successfully!', 'service');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findOrFail($id);
        if ($service){
            File::delete(public_path('upload/images/services/'.$service->image));
            $service->delete();
            toastr()->success('service has been Deleted successfully!', 'service');
            return redirect()->route('services.index');
        }else{
            toastr()->success('service has been Deleted Faild!', 'service');
            return redirect()->route('services.index');
        }
    }
}
