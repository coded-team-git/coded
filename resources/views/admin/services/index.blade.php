@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Services</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Services</li>

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
                                <a href="{{ route('services.create') }}"> <button
                                        class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                        Add</button></a>
                            </div>

                            <br><br>
                            <div class="table-rep-plugin">

                                <div class="table- mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">#</th>
                                                <th data-priority="1">Image</th>
                                                <th data-priority="3">Name</th>
                                                <th data-priority="1">Description</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <th data-priority="1">{{ $loop->index + 1 }}</th>
                                                    <th ><img src="{{asset('upload/images/services/'.$service->image)}}" height="50" width="50"></th>
                                                    <th data-priority="3">{{ $service->name}}</th>
                                                    <th data-priority="2">{{ $service->description }}</th>

                                                    <td>
                                                        <div class="">
                                                            <div class="btn-group me-1 mt-2">
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="mdi mdi-chevron-down"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#edit{{ $service->id }}">
                                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                                        <span>Edit</span>
                                                                    </button>
                                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $service->id }}">
                                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                                        <span>Delete</span>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit{{ $service->id }}" tabindex="-1"
                                                    aria-labelledby="edit" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Service
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('services.update', $service->id) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Name-en</label>
                                                                        <input value="{{ $service->name_en }}" type="text"
                                                                            name="name" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1"
                                                                            class="form-label">Name-ar</label>
                                                                        <input value="{{ $service->name_ar }}" type="text"
                                                                            name="name" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Image</label>
                                                                        <input accept="image/*" name="image_path"
                                                                            type="file" class="form-control" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1"
                                                                            class="form-label">Description_en</label>
                                                                        <input value="{{ $service->description_en }}"
                                                                            type="text" name="description"
                                                                            class="form-control" id="exampleInputPassword1">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1"
                                                                            class="form-label">Description_ar</label>
                                                                        <input value="{{ $service->description_ar }}"
                                                                            type="text" name="description"
                                                                            class="form-control" style="direction: rtl" id="exampleInputPassword1">
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{ $service->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Delete Service</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Do you want to delete the {{ $service->name }} service?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form action="{{ route('services.destroy', $service->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Sure</button>
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
                                    {{ $services->links() }}
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
