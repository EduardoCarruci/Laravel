<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <body background="/images/wallhaven-238003.jpg" > 
        

        <title>PROYECTO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #2391a0;
                color: #2b2e31;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .red
            {
                color: white;
                background-color: red;
            }
            .green
            {
                color: white;
                background-color: green;
            }
            .blue
            {
                color: white;
                background-color: blue;
            }

            .full-height {
                height: 100vh;
            }

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
                margin-bottom: 50px;
            }
            .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #7bd6d7;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            font-family: "Times New Roman", Georgia, Serif;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
               
            <div class="content">
                <div class="title m-b-md">                   
                    <img src="/images/logo_proyecta.png"  style="max-width: 1000px; max-height: 1000px" class="card-img-top" alt="...">
                </div>

                <div class="links">
                
                   
            <div class="card-group">
                    <div class="card">
                        <img src="/images/personal.jpg"  style="width:525px; height:350px;" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Personal</h5>
                        <a href="http://localhost:8000/hospitalizacion/personal">           
                            <button type="button" class="btn btn btn-dark btn-primary btn-lg btn-block">Visualizar Personal</button>
                        </a>   
                        </div>
                    </div>

                    <div class="card">
               
                        <img src="/images/insumos.png"  width="550px" height="350px" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Insumos</h5>
                        <a href="http://localhost:8000/hospitalizacion/insumos"> 
                           
                            <button type="button" class="btn btn btn-dark btn-primary btn-lg btn-block">Visualizar Insumos</button>
                        </a>   
                        
                        </div>
                    </div>
                    <div class="card">
               
                            <img src="/images/hospital.png"  width="250px" height="350px" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Hospitalizacion</h5>
                            <a href="http://localhost:8000/hospitalizacion/hospital"> 
                               
                                <button type="button" class="btn btn btn-dark btn-primary btn-lg btn-block">Ver mas..</button>
                            </a>   
                            
                            </div>
                        </div>

                  
            </div>

      
                </div>
            </div>
        </div>
    </body>
</html>
