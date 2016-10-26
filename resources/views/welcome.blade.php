<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>



            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="">
            @if (Route::has('login')&& !(Auth::check()))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>


                </div>
            @endif
                @if(Auth::check())
                    <div class="top-right links">

                        <a href="{{ url('/admin/users') }}">{{Auth::user()->name}}</a>

                    </div>
                @endif

</div>

        <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">

                  @foreach($post as $post)  <!-- Blog Post -->

                    <!-- Title -->
                    <h1>{{$post->title}}</h1>

                    <!-- Author -->
                    <p class="lead">
                        by {{$post->user->name}}</a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at}}</p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-responsive" height="200" src="{{$post->photo->file}}" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">{{$post->body}}</p>

                    <hr>

                    <!-- Blog Comments -->

                    <!-- Comments Form -->


                    <hr>

                    <!-- Posted Comments -->

                    <!-- Comment -->

                    <!-- Comment -->




               </div></div>
</div>
                    <!-- Blog Categories Well -->
@endforeach