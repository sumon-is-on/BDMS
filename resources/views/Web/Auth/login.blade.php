<!DOCTYPE html>
<html lang="en">
<head>
    <title>CarBook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    @notifyCss
</head>
<body style="background-image: url('/web/don1.jpeg'); background-size: cover;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5 d-flex flex-column align-items-center">
                        <h1 class="text-center mb-4" style="font-size: xx-large; font-weight: bold;">Please, Login !</h1>
                        <form action="{{ route('user.login.post') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left py-3" placeholder="Email" style="font-size: 18px;" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left py-3" placeholder="Password" style="font-size: 18px;" required>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded submit px-4 py-3">Login</button>
                                </div>
                                <div class="ml-3 mr-3">
                                    <p>OR</p>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('user.registration') }}">
                                        <button type="button" class="btn btn-primary rounded submit px-4 py-3">Registration</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('notify::components.notify')
    @notifyJs
</body>
</html>
