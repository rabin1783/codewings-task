@extends('admin.master')
@section('content')
    <div>
        <div class="page">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="text-center mb-5">
                                        <h3 class="text-primary mt-5">Codewings</h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">Log In</h1>
                                            </div>
                                            <form class="mt-5" method="Post" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email" class="mb-1 ms-1">Email</label>
                                                    <div class="input-group ">
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Enter Your Email Address" name="email"
                                                            required>
                                                    </div>
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="mb-1 ms-1">Password</label>
                                                    <div class="input-group ">
                                                        <div class="input-group" id="Password-toggle1">
                                                            <input class="form-control" type="password" id="password"
                                                                name="password" placeholder="Confirm Password" required>
                                                        </div>
                                                        @error('password')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="form-check mb-4">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center mb-3">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg w-100 br-7">Login
                                                    </button>
                                                </div>                                               
                                                
                                            </form>

                                            <div class="form-group row mb-0 mt-3">
                                                <div class="col-md-8 offset-md-4">
                                                    <a href="{{ url('/login/github') }}" class="btn btn-warning">
                                                        {{ __('Login with Github') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    document.body.classList.add('login');
</script>
@endsection

