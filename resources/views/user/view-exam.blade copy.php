<!doctype html>
<html lang="en">

<head>
    <title>Exam View</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #333;
        }

        .container {
            background-color: #555;
            color: #ddd;
            border-radius: 10px;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            max-width: 700px;
        }

        .container>p {
            font-size: 32px;
        }

        .question {
            width: 75%;
        }

        .options {
            position: relative;
            padding-left: 40px;
        }

        #options label {
            display: block;
            margin-bottom: 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .options input {
            opacity: 0;
        }

        .checkmark {
            position: absolute;
            top: -1px;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #555;
            border: 1px solid #ddd;
            border-radius: 50%;
        }

        .options input:checked~.checkmark:after {
            display: block;
        }

        .options .checkmark:after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            background: white;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark {
            background: #21bf73;
            transition: 300ms ease-in-out 0s;
        }

        .options input[type="radio"]:checked~.checkmark:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn-primary {
            background-color: #555;
            color: #ddd;
            border: 1px solid #ddd;
        }

        .btn-primary:hover {
            background-color: #21bf73;
            border: 1px solid #21bf73;
        }

        .btn-success {
            padding: 5px 25px;
            background-color: #21bf73;
        }

        @media(max-width:576px) {
            .question {
                width: 100%;
                word-spacing: 2px;
            }
        }
    </style>

    <div class="container mt-sm-5 my-1">
        <a href="javascript:void(0)" onclick="history.back()" class="float-right btn btn-warning text-dark"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        <div class="row">
            <div class="col-4">Exam: {{ $subject[0]->subject }}</div>
            <div class="col-4">Timing: 30 Minute</div>
            <div class="col-4"><span id="countTime">Time Start:</span> </div>
        </div>

        <div class="row">
            @if(count($data) > 0)
            <form action="{{ route('submitExam') }}" id="examForm" method="POST">
                @csrf
                @foreach($data as $key=>$res)
                <div class="question ml-sm-5 pl-sm-5 pt-2">
                    <h4 class="text-dark"> Q.{{$key+1}}) {{ $res->question }}</h4>
                    <input type="hidden" name="question{{$key+1}}" value="{{  $res->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="subject_id" value="{{ $subject[0]->id  }}">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input pt-3" type="radio" value="a" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            a) {{ $res->a }}
                            </label></h5>
                            <input class="form-check-input pt32" type="radio" value="b" name="option{{ $key+1 }}">
                            <h5 class="text-dark"> <label class="form-check-label pt-1" >
                            b) {{ $res->b }}
                            </label></h5>
                            <input class="form-check-input pt-3" type="radio" value="c" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            c) {{ $res->c }}
                            </label></h5>
                            <input class="form-check-input pt-3" type="radio" value="d" name="option{{ $key+1 }}">
                            <h5 class="text-dark">  <label class="form-check-label pt-1" >
                            d) {{ $res->d }}
                            </label></h5>
                            <!-- <input type="radio" checked="checked" name="option[]" style="display:none;"> -->
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="col-md-12 mt-3">
                        <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                        <button type="submit" class="submitExam btn btn-primary w-100">Submit</button>
                    </div>
            </form>
            
            @else
            <h1 class="text-center">No Question Paper</h1>
            @endif
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Timer Script -->
    <script>
        var countdown = 30 * 60 * 1000;
        var timerId = setInterval(function() {
            countdown -= 1000;
            var min = Math.floor(countdown / (60 * 1000));
            //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
            var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000); //correct

            if (countdown <= 0) {
                alert("30 min!");
                clearInterval(timerId);
                //doSomething();
            } else {
                $("#countTime").html(min + " : " + sec);
            }

        }, 1000); //1000ms. = 1sec.
    </script>
</body> 
</html>