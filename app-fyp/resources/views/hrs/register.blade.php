<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skill Taxonomy Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">
                        <div class='card-header'>
                                <h1 class='card-title'>Register Account</h1>
                        </div>
                        <div class='card-body'>
                            @if(Session::has('Success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('Success')}}
                                </div>
                            @endif
                            <form action='{{route ('acc.register')}}' method='POST'>
                                @csrf
                                <div class='mb-3'>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required>
                                </div>
                                <div class='mb-3'>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Sample@Example.com" required>
                                </div>
                                <div class='mb-3'>
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <div class='mb-3'>
                                    <label for="permision" class="form-label">Permision</label>
                                    <select name="permision" class="form-control" id="permision" required>
                                        <option value="" disabled selected>Select Permission</option>
                                        <option value="Manager">Manager</option>
                                        <option value="HR">HR</option>
                                        <option value="Employee">Employee</option>
                                    </select>
                                </div>
                                <div class='mb-3'>
                                    <div class="d-grid">
                                        <button class='btn btn-primary'>Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('hr.home') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
                        
</body>
</html>