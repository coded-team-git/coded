@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Sections</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Sections</a></li>
                            <li class="breadcrumb-item active">New Section</li>
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
                            <form action="{{ route('sections.store') }}" method="post" enctype="multipart/form-data">
                                @csrf




                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Section english title</label>
                                    <input type="text"  name="title_en" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Section arabic title</label>
                                    <input type="text" name="title_ar" style="direction: rtl;" class="form-control">
                                </div>

                                <div class="form-group mb-3" data-select2-id="select2-data-12-1fss">
                                    <label class=" col-form-label">Add to page</label>
                                    <div class="" data-select2-id="select2-data-11-lw53">
                                        <select name="page_id" id="service_id"
                                                class="form-select select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                tabindex="-1" aria-hidden="true">
                                            <option selected disabled>Select page</option>
                                            @foreach ($pages as $page)
                                                <option value="{{$page->id}}"> {{$page->name}} </option>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary">Submit</button>
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
