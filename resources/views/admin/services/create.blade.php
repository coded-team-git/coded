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
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                            <li class="breadcrumb-item active">New Service</li>
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
                            <form action="{{route('services.store')}}" method="post"   enctype="multipart/form-data">
                               @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service english name</label>
                                    <input type="text" name="name_en" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service arabic name</label>
                                    <input type="text" name="name_ar" style="direction: rtl" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service english Description</label>
                                    <input type="text" name="description_en" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service arabic Description</label>
                                    <input type="text" name="description_ar" style="direction: rtl" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label>Image</label>
                                    <input  accept="image/*" name="image_path" type="file" class="form-control" />
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
