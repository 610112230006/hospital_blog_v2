<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ลืมรหัสผ่าน</title>
    

    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap" rel="stylesheet">    
    
</head>

<body>
    <main class="login-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">ลืมรหัสผ่าน</div>
                        <div class="card-body">
        
                          @if (Session::has('message'))
                               <div class="alert alert-success" role="alert">
                                  {{ Session::get('message') }}
                              </div>
                          @endif
        
                            <form action="{{ url('forgett-password') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">                                  
                                        ส่งลิงค์เปลี่ยนรหัส
                                    </button>
                                </div>
                            </form>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>
      
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('js/functions.js') }}"></script>
</body>

</html>


