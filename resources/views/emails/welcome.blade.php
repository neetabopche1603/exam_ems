<!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container w-50 mt-4 responsive">
        <div class="card" style="background-color: #c0d7af;">
            <div class="card-header text-center text-light" style="background-color:
#0a2558 ;">
                <h3></h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                <img src="https://lageniusinfo.com/wp-content/uploads/2019/04/Email-Deliverability-gif-is-hard1.gif" alt="" width="200px" height="150px">
                </div>
                <h2 class="text-center text-primary"> Hey {{$user['name']}} </h2>
                <p class="text-center">You have Account has been Created Successfully.....!</p>
                <h3 class="text-center text-success">You Credential</h3>
                <span class="">Email:- <b>{{$user['email']}}</b></span><br>
                <span>Password:- <b>{{$user['password']}}</b></span>
            </div>

        </div>
        <div class="card-footer text-center text-light" style="background-color:
#0a2558 ;">
                @2022 Neeta Bopche
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>