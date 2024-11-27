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
                            <li class="breadcrumb-item"><a href="{{ route("projects.index") }}">Projects</a></li>
                            <li class="breadcrumb-item active">New Project</li>

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
                            <form class="well form-horizontal" action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3">
                                            <label class=" col-form-label">Project Name</label>
                                                <input style="text-transform: capitalize;" placeholder="Enter Project Name"
                                                       name="name" id="name" type="text" class="form-control">

                                        </div>
                                        <div class="form-group mb-3">
                                            <label class=" col-form-label">Link</label>
                                                <input style="text-transform: capitalize;" placeholder="Enter Project Link"
                                                       name="Link" id="name" type="text" class="form-control">

                                        </div>
                                        <div class="form-group mb-3">
                                            <label class=" col-form-label">Tag</label>
                                                <input style="text-transform: capitalize;" placeholder="Enter Project Tag"
                                                       name="tag" id="tag" type="text" class="form-control">

                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="col-form-label">Project images</label>
                                                <input class="form-control" multiple name="images[]" id="course_photo" type="file">
                                        </div>








                                        <div class="form-group mb-3" data-select2-id="select2-data-12-1fss">
                                            <label class="form-label">Add to service</label>
                                            <div  data-select2-id="select2-data-11-lw53">
                                                <select name="service_id" id="service_id"
                                                        class="select select2-hidden-accessible form-select" data-select2-id="select2-data-1-bgy2"
                                                        tabindex="-1" aria-hidden="true">
                                                    <option selected disabled>Select service</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{$service->id}}" > {{$service->name}} </option>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" >Create</button>
                                </div>
                            </form>
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
