<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inisiasi FTI UAJY 2023 | Admin Login</title>
    <link rel="icon" href="{{asset('images/logo.png')}}">
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    {{-- bootstrap css --}}
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div style="display: flex;flex-direction:column; justify-content: center; align-items: center;  height: 100vh; background: rgb(245, 245, 245)">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div style="max-width: 10rem">
            <img src="{{asset('admin/assets/images/Logo-Inisiasi-FTI-2023.png')}}" class="img-fluid" alt="">
        </div>
        <form method="POST" action="{{route('store.admin.login')}}" class="form-control" style="padding: 2rem; max-width: 30rem; display: flex; flex-direction: column; ">
            @csrf
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
            @endif

            <!-- Email Address -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>

                <input class="form-control" id="email" type="text" name="email" required autofocus></input>
            </div>

            <!-- Password -->
            <div class="form-outline mb-4">
                <label for="password">Password</label>

                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"> </input>
            </div>

            <!-- Remember Me -->
            <div class="row mb-1">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>
                </div>

            </div>

            <div class="d-flex align-items-center justify-content-center mt-4">
                {{-- @if (Route::has('password.request'))
             <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
                </a>
                @endif --}}

                <button class="btn btn-danger" style="margin-left: 1rem; ">Login</button>
            </div>
        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
        @endif
    </script>
</body>

</html>