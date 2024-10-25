<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skill Taxonomy Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class='card-header'>
                    <h1 class="card-title">Login</h1>
                </div>
                @if(Session::has('Success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('Success')}}
                                </div>
                            @endif
                <div class='card-body'>
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error')}}
                        </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class='mb-3'>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Sample@Example.com" required>
                        </div>
                        <div class='mb-3'>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        {{-- <div class='mb-3'>
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div> --}}
                        <br>
                        <br>
                    </div>
                    <button class="btn btn-primary">Login</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>