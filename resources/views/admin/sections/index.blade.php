@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start section title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Sections</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sections</li>

                        </ol>
                    </div>


                </div>
            </div>
        </div>
        <!-- end section title -->

        <!-- Start Page-content-Wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="m-0"></h3>
                                <a href="{{ route('sections.create') }}"> <button
                                        class="btn btn-success waves-effect waves-light">
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
                                                <th data-priority="3">Page</th>
                                                <th data-priority="3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sections as $section)
                                                <tr>
                                                    <th data-priority="1">{{ $loop->index + 1 }}</th>
                                                    <th data-priority="3">{{ $section->name}}</th>
                                                    <th data-priority="3">{{ $section->page->name }}</th>

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
                                                                        data-bs-target="#edit{{ $section->id }}">
                                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                                        <span>Edit</span>
                                                                    </button>
                                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                                        data-bs-target="#delete{{ $section->id }}">
                                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                                        <span>Delete</span>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1"
                                                    aria-labelledby="edit" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Section
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('sections.update', $section->id) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Section english title</label>
                                                                        <input type="text" value="{{ $section->title_en }}" name="title_en" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Section arabic title</label>
                                                                        <input type="text" value="{{ $section->title_ar }}" name="title_ar" class="form-control">
                                                                    </div>

                                                                    <div class="form-group mb-3" data-select2-id="select2-data-12-1fss">
                                                                        <label class=" col-form-label">Add to page</label>
                                                                        <div class="" data-select2-id="select2-data-11-lw53">
                                                                            <select name="page_id" id="service_id"
                                                                                    class="select form-select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                                                    tabindex="-1" aria-hidden="true">
                                                                                <option selected disabled>Select page</option>
                                                                                @foreach ($pages as $page)
                                                                                    <option value="{{$page->id}}" {{($page->id == $section->page->id)? 'selected':''}}> {{$page->name}} </option>
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
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
                                                <div class="modal fade" id="delete{{ $section->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Delete Section</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Do you want to delete the {{ $section->name }} section?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form action="{{ route('sections.destroy', $section->id) }}"
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
                                    {{ $sections->links() }}
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
