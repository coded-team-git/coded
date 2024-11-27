@extends('coded.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/Mystyle.css') }} " />
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
<div class="container py-5">
    <div class="row parent justify-content-around">
        <div class="col-lg-5 col-md-12 col-sm-12 Contact-Information">
            <h3>{{ $sections[0]->name }}</h3>
            <p>
                {{ $sections[0]->contents[0]->content }}
            </p>
            <div>
                <p class="title">{{ __('website/contact-us.email') }} :</p>
                <div class="information">
                    <i class="bx bx-envelope"></i>
                    <p>coded.team.info@gmail.com
                    </p>
                </div>
            </div>
            <div>
                <p class="title">{{ __('website/contact-us.phone') }} :</p>
                <div class="information">
                    <i class="bx bxs-phone-call"></i>
                    <p>0567934841</p>
                </div>
            </div>
            <div>
                <p class="title">{{ __('website/contact-us.follow') }} :</p>
                <div class="information">
                    <!-- icon -->
                    <i class="bx bxl-youtube"></i>
                    <i class="bx bxl-instagram"></i>
                    <i class="bx bxl-facebook"></i>
                    <i class="bx bxl-twitter"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12 col-sm-12 message">
            <p class="ready">{{ $sections[1]->name }}</p>
            <div id="alreat">

            </div>
            <form id="comment-form" class="send-message">
                <input id="one" name="name" type="text" placeholder="{{ __('website/contact-us.name') }} *" class="name" />
                <input id="tow" name="email" type="email" placeholder="{{ __('website/contact-us.email') }} *" class="email" />
                <textarea id="three" name="message" class="text-area" cols="30" rows="5"
                    placeholder="{{ __('website/contact-us.write') }} .."></textarea>

                <div class="submit">
                    <button>{{ __('website/contact-us.send') }}</button>
                    <!-- icon -->
                    <i class="bx bx-left-arrow-alt"></i>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    console.log('Error');
        $('#comment-form').submit(function(e){
            e.preventDefault();
            console.log('Error');
            $.ajax({
                    type : 'post',
                    url  : '{{route("sendMessage")}}',
                    data : {
                        _token:'{{csrf_token()}}',
                        name :$('#one').val(),
                        email : $('#tow').val(),
                        message : $('#three').val(),
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            $('#alreat').text('sent succesfully').removeClass('alert alert-danger').addClass('alert alert-success');
                            $('#one').val('');
                            $('#tow').val('');
                            $('#three').val('');
                            console.log('true:', data);
                        }else{
                            $('#alreat').val('');
                            $('#alreat').text(data.error).removeClass('alert alert-success').addClass('alert alert-danger');
                            console.log('error:', data);                        }

                    },
                    error: function (data) {
                       console.log('error:', data);
                    }
                }

            )}
        )
</script>

@endsection
