@include('layouts.header-login')

<div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-md-6 col-sm-8">
                    <div class="auth-brand text-center mb-4">
                        <a href="index.html" class="logo-dark">
                            <img src="assets/images/logo-black.png" alt="dark logo" height="32">
                        </a>
                        <a href="index.html" class="logo-light">
                            <img src="assets/images/logo.png" alt="logo" height="32">
                        </a>
                        <p class="text-muted mt-3 text-center">Ingrese su email y contraseña para continuar.</p>

                    </div>

                    <div class="card p-4 rounded-4">


                         @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                         @enderror
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
                                <div class="input-group">

                                    <input type="email" class="form-control"  id="email" placeholder="email@ejemplo.com"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <div class="input-group">

                                    <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required autocomplete="current-password">

                                </div>


                            </div>

                            <div class="d-flex justify-content-center align-items-center mb-3">

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-underline link-offset-3 text-muted">Olvidó su contraseña?</a>
                                @endif

                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold py-2">Ingresar</button>
                            </div>
                        </form>


                    </div>


                </div>
            </div>
        </div>
    </div>

@include('layouts.footer-login')
