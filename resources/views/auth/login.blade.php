<x-layout>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" class="mt-2">
                            @csrf
                            <div class="mb-md-5 mt-md-4">
                                <h2 class="fw-bold mb-4 text-uppercase">Login</h2>
                                <div class="form-outline form-white mb-4">
                                    <input name="email" type="email" class="form-control form-control-lg" placeholder="Email" value="{{old('email')}}"/>
                                    <span class="text-danger">
                                        @error('email') {{$message}} @enderror
                                    </span>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input name="password" type="password" class="form-control form-control-lg" placeholder="Password"/>
                                    <span class="text-danger">
                                        @error('password') {{$message}} @enderror
                                    </span>
                                </div>
                                <div class="mb-4">
                                    <input type="checkbox" name="remember">
                                    <label for="remember">Rememberme</label>
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                    Login
                                </button>
                            </div>
                            <div>
                                <p class="mb-0">Don't have an account? <a href="register" class="text-white-50 fw-bold">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>