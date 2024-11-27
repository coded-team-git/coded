@extends('coded.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/works.css') }}" />
    <div class="content-1">
        <div class="paragraph_content">
            <h1>مشاريعنا</h1>
            <p>عرض بعض من أعمالنا ومشاريعنا في السوق الخليجي</p>
        </div>
    </div>

    </div>
    <div class="container">
        <div class="containerbyme">
            <div class="tab-wrap">

                @php
                    $firstCategoryId = $services->first()->id; // تأكد من أن لديك فئات في القائمة
                @endphp

                <!-- active tab on page load gets checked attribute -->
                @foreach ($services as $service)
                    <input type="radio" id="tab{{ $loop->index + 1 }}" name="tabGroup1" class="tab"
                        @if ($service->id == $firstCategoryId) checked @endif>
                    <label for="tab{{ $loop->index + 1 }}">{{ $service->name }}</label>
                @endforeach

                @foreach ($services as $service)
                    <div class="tab__content">
                        <div class="parent_cards">
                            @if ($service->name_ar == 'تطوير موبايل')
                                @foreach ($service->projects as $project)
                                    <a href="{{ $project->link }}" class="card mobile-card"
                                        style="
                                   background-image: url('{{ asset('upload/images/Project/' . $project->images[0]->image) }}')">
                                        <div class="content_card rel">
                                            <div class="content__">
                                                <img src="{{ asset('assets/images/Rectangle 144.png') }}" alt="">
                                                <div class="child_cc">
                                                    <h2>{{ $project->name }} </h2>
                                                    <div class="spans">
                                                        @foreach ($project->tag as $tag)
                                                            <span>{{ $tag }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="album-{{ $project->id }}" style="display: none"
                                            data-id="{{ $project->id }}" class="album">
                                            @foreach ($project->images as $image)
                                                <a href="{{ asset('upload/images/Project/' . $image->image) }}"
                                                    data-src="photo1.jpg" data-sub-html="Album 1 Photo 1">
                                                    <img src="{{ asset('upload/images/Project/' . $image->image) }}"
                                                        alt="Album 1 Cover Photo" class="cover">
                                                </a>
                                            @endforeach
                                        </div>

                                    </a>
                                @endforeach
                            @else

                            @foreach ($service->projects as $project)
                                <a href="{{ $project->link }}" class="card"
                                    style="
                                   background-image: url('{{ asset('upload/images/Project/' . $project->images[0]->image) }}')">
                                    <div class="content_card rel">
                                        <div class="content__">
                                            <img src="{{ asset('assets/images/Rectangle 144.png') }}" alt="">
                                            <div class="child_cc">
                                                <h2>{{ $project->name }} </h2>
                                                <div class="spans">
                                                    @foreach ($project->tag as $tag)
                                                        <span>{{ $tag }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            @endif
                        </div>


                    </div>
                @endforeach


            </div>

        </div>

    </div>
    </div>
@endsection
