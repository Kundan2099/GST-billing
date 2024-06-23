<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="icon" type="image/x-icon" href="{{$logo}}"> --}}

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">

    {{-- Title --}}
    <title>Registration </title>

</head>

<body>

    {{-- Main (Start) --}}
    <main>
            <div class="container lg:px-10 lg:py-10 sm:py-5 space-y-7">

                <div class="space-y-3">
                    <h1 class="font-semibold text-ascent lg:text-4xl sm:text-3xl">Account Registration</h1>
                    <p class="text-xs text-gray-500">Register as an in {{config('app.name')}}</p>
                </div>

                <form action="{{route('handle.register')}}" method="POST">
                    @csrf
                <figure class="panel-card">
                    <div class="panel-card-header">
                        <div>
                            <h1 class="panel-card-title">Registration</h1>
                            <p class="panel-card-description">Please fill the required fields</p>
                        </div>
                    </div>
                    <div class="panel-card-body">
                        <div class="grid 2xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">
        
                            {{-- Divider --}}
                            <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title">General Information</h1>
                            </div>
        
                            {{-- Name --}}
                            <div class="input-group">
                                <label for="name" class="input-label">Name <em>*</em></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="input-box-md @error('name') input-invalid @enderror" placeholder="Enter Name"
                                    minlength="1" maxlength="250" required>
                                @error('name')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>
        
                            {{-- Email --}}
                            <div class="flex flex-col">
                                <label for="email" class="input-label">Email Address <em>*</em></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="input-box-md @error('email') input-invalid @enderror" placeholder="Enter Email Address"
                                    required minlength="1" maxlength="250">
                                @error('email')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>
        
                            {{-- Divider --}}
                            <div class="2xl:col-span-5 lg:col-span-4 md:col-span-2 sm:col-span-1">
                                <h1 class="title mt-3">Set Password</h1>
                            </div>

                            {{-- Password --}}
                            <div class="input-group">
                                <label for="password" class="input-label">Password <em>*</em></label>
                                <input type="password" name="password"
                                    class="input-box-md @error('password') input-invalid @enderror" placeholder="Enter Password"
                                    required minlength="6" maxlength="20">
                                @error('password')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Confirm password --}}
                            <div class="input-group">
                                <label for="password_confirmation" class="input-label">Confirm password <em>*</em></label>
                                <input type="password" name="password_confirmation"
                                    class="input-box-md @error('password_confirmation') input-invalid @enderror"
                                    placeholder="Repeat Password" required minlength="6" maxlength="20">
                                @error('password_confirmation')
                                    <span class="input-error">{{ $message }}</span>
                                @enderror
                            </div>

        
                        </div>
                    </div>
                    <div class="panel-card-footer">
                        <button type="submit" class="btn-primary-md md:w-fit sm:w-full">Register</button>
                    </div>
                </figure>
            </form>


            </div>

            
    </main>
    {{-- Main (End) --}}

    {{-- Script --}}
    <script src="{{ asset('admin/js/app.js') }}"></script>

    @if (session('message'))
        <script defer>
            swal({
                icon: "{{ session('message')['status'] }}",
                title: "{{ session('message')['title'] }}",
                text: "{{ session('message')['description'] }}",
            });
        </script>
    @endif

</body>

</html>
