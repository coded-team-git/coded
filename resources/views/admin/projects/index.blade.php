@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Projects</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Projects</li>

                        </ol>
                    </div>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Page-content-Wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="m-0"></h3>
                                <a href="{{route('projects.create')}}">  <button class="btn btn-success waves-effect waves-light">
                                    <i class="mdi mdi-plus"></i> Add</button></a>

                            </div>

                            <br><br>
                            <div class="table-rep-plugin">

                                <div class="table- mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="3">Name</th>
                                            <th data-priority="3">Service</th>
                                            <th data-priority="1">Image</th>
                                            <th data-priority="3">tag</th>
                                            <th data-priority="3">Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <th data-priority="1">{{$loop->index+1}}</th>
                                                <th data-priority="3">{{$project->name}}</th>
                                                <th data-priority="3">{{$project->service->name}}</th>
                                                <th>
@foreach ($project->images as $image)
<img src="{{asset('upload/images/Project/'.$image->image)}}" height="50" width="50">

@endforeach
                                                </th>
                                                <th>



                                                    @foreach ($project->tag as $ser)
                                                    <h5 style="display: inline-block">
                                                        <span class="me-1 badge bg-primary">{{ $ser }}</span>
                                                    </h5>
                                                @endforeach
                                                </th>
                                                <td>
                                                    <div class="">
                                                        <div class="btn-group me-1 mt-2">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <i class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#edit{{$project->id}}">
                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                    <span>Edit</span>
                                                                </button>
                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{$project->id}}">
                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="edit{{$project->id}}" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('projects.update',$project->id)}}" method="post"   enctype="multipart/form-data">
                                                              @csrf
                                                                @method('put')
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label">Project Name</label>
                                                                            <div class="col-lg-9">
                                                                                <input style="text-transform: capitalize;" placeholder="Enter Project Name"
                                                                                       name="name" id="name" value="{{$project->name}}" type="text" class="form-control">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label">Project Link</label>
                                                                            <div class="col-lg-9">
                                                                                <input style="text-transform: capitalize;" placeholder="Enter Project Name"
                                                                                       name="link" id="name" value="{{$project->link}}" type="text" class="form-control">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label">Project tag</label>
                                                                            <div class="col-lg-9">
                                                                                <input style="text-transform: capitalize;" placeholder="Enter Project Name"
                                                                                       name="tag" id="name" value="{{  implode(',',$project->tag) }}" type="text" class="form-control">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label">Project Photo</label>
                                                                            <div class="col-lg-9">
                                                                                <input class="form-control" name="images[]" multiple id="course_photo" type="file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row" data-select2-id="select2-data-12-1fss">
                                                                            <label class="col-lg-3 col-form-label">Add to service</label>
                                                                            <div class="col-lg-9" data-select2-id="select2-data-11-lw53">
                                                                                <select name="service_id" id="service_id"
                                                                                        class="select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                                                        tabindex="-1" aria-hidden="true">
                                                                                    <option selected disabled>Select service</option>
                                                                                    @foreach ($services as $service)
                                                                                        <option value="{{$service->id}}" {{($service->id == $project->service_id)? 'selected':''}} > {{$service->name}} </option>
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group text-right">
                                                                    <button type="submit" class="btn btn-primary" >Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="delete{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Project</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete the {{$project->name}} project?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <form action="{{route('projects.destroy',$project->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-primary">Sure</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-center">
                                    {{ $projects->links() }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
        <!-- End Page-content-wrapper -->

    </div>





@endsection
