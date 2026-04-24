@include('layouts.header-login')


<div class="auth-box overflow-hidden align-items-center d-flex">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-md-6 col-sm-8">
                <div class="auth-brand text-center mb-4">
                    <a href="index.html" class="logo-dark">
                        <img src="{{ asset('assets/images/logo-black.png') }}" alt="dark logo" height="32">
                    </a>
                    <a href="index.html" class="logo-light">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="32">
                    </a>
                    <p class="text-muted mt-3 text-center">Reset password</p>

                </div>

                <div class="card p-4 rounded-4">


                     @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Dirección de E-mail<span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>



                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold py-2">Envíar link para reestablecer la contraseña</button>
                        </div>
                    </form>


                </div>


            </div>
        </div>
    </div>
</div>

@include('layouts.footer-login')
