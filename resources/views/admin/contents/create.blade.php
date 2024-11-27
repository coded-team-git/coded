@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Contents</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Contents</a></li>
                            <li class="breadcrumb-item active">New Content</li>
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
                            <form action="{{ route('contents.store') }}" method="post" enctype="multipart/form-data">
                                @csrf




                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Content english title</label>
                                    <input type="text" name="content_en" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Content arabic title</label>
                                    <input type="text" name="content_ar" style="direction: rtl" class="form-control">
                                </div>

                                <div class="form-group mb-3" data-select2-id="select2-data-12-1fss">
                                    <label class=" col-form-label">Add to page</label>
                                    <div class="" data-select2-id="select2-data-11-lw53">
                                        <select id="page_id" name="page_id" id="service_id"
                                            class="select form-select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                            tabindex="-1" aria-hidden="true">
                                            <option selected disabled>Select page</option>
                                            @foreach ($pages as $page)
                                                <option value="{{ $page->sections }}"> {{ $page->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group mb-3" id="selection" style="display: none" data-select2-id="select2-data-12-1fss">
                                    <label class=" col-form-label">Add to Section</label>
                                    <div class="" data-select2-id="select2-data-11-lw53">
                                        <select   id="section_id" name="section_id" id="service_id"
                                            class="select form-select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                            tabindex="-1" aria-hidden="true">
                                            <option selected disabled>Select section</option>
                                            {{-- @foreach ($pages as $page)
                                                <option value="{{$page->id}}" > {{$page->name}} </option>

                                            @endforeach --}}
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

@push('scripts')
    <script>
        // import {castArray, isArray} from "lodash";

        $(document).ready(function() {
            //? to show the section select
            $(document).on('change', '#page_id', function(e) {



                const sections =  JSON.parse($(this).val()) //? to get the sections and parse it to objects
                const sectionsSelect = $('#section_id') //? to get the select of sections 
                sectionsSelect.empty().append('<option selected disabled>Select section</option>')
                sections.forEach(section => {
                    sectionsSelect.append(`<option value="${section.id}">${section.name}</option>`)
                });

                $('#selection').css("display", "block")

            })

        }) //! end of document ready
    </script>
@endpush
