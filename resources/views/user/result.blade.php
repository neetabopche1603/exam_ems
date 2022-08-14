@extends('user.layouts.app')
@section('title','Student Exam Portal')
@section('content')

<div class="container thank center">
    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjSzRIOZBMQrPGSj9Q-RvWdBg3xMAmQ_-mdquh9ct9AveyR_icZgt6T6QUZDkjwdqoXL_okRwPnzzycUK2NwpiU0x8V5nbEpWtV1daNvdXypIvMagWmPb-L1im6lblUHgXm2ATHr_7p8MxhU_V3dq7LVji8IEmBD8ag93Y4ujSDJYMDgNtOHWA6vWv8nA=s16000" alt="" width="100%" height="10%">

</div>

<h3 class="text-success text-center">Your Score : {{ $result }} %</h3>
@php
$opt = json_decode($answer->option);
@endphp
<section class="py-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center">Check Your Answers</h2>
            @if(count($answer) > 0)
            @foreach($answer as $key=>$res)
            <h5 class="text-dark"> Q.{{$key+1}}) {{ $res->question }}</h5>
            <div class="row">
                <div class="col-md-4 my-2">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="a" name="optiona"> -->
                        <h6 class="text-dark"> <label class="form-check-label">
                                a) {{ $res->a }}
                            </label></h6>
                        <!-- <input class="form-check-input" type="radio" value="c" name="optionc"> -->
                        <h6 class="text-dark"> <label class="form-check-label">
                                b) {{ $res->b }}
                            </label></h6>
                    </div>
                </div>
                <div class="col-md-4 my-2">
                    <div class="form-check">
                        <!-- <input class="form-check-input" type="radio" value="b" name="optionb"> -->
                        <h6 class="text-dark"> <label class="form-check-label">
                                c) {{ $res->c }}
                            </label></h6>
                        <!-- <input class="form-check-input" type="radio" value="d" name="optiond"> -->
                        <h6 class="text-dark"> <label class="form-check-label">
                                d) {{ $res->d }}
                            </label></h6>
                    </div>
                </div>

                <div class="col-md-2">
                    Your Answer :- {{ $opt[$key] }}
                </div>
            </div>
            <h5 class="text-dark">Answer :- Option {{ $res->answer }} </h5>
            <hr>
            @endforeach
            @else
            <h1 class="text-center">No Questions....!!!!</h1>
            @endif

        </div>
    </div>
</section>
@endsection