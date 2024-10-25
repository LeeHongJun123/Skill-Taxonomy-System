<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	
    <style>
        /* Additional styles for sidebar */
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            display: block;
        }

        .sidebar a:hover {
            color: #007bff;
        }

        .main-content {
            margin-left: 200px; /* Same as the width of the sidebar */
            padding: 0px 10px;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="{{route('hr.home')}}">Home</a>
        <a href={{route('acc.register')}}>Create Account</a>
        <a href="{{route('Hrview.profile')}}">Employee</a>
        <a href='{{route('Hr.viewtaxonomy')}}'>View Skill Taxonomy</a>
        <a href="{{route('password.change')}}">Change Password</a>
        <form action="{{route('acc.logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>

<div class="main-content">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>Skill Taxonomy System, {{Auth::user()->name}}</h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navigation links can go here -->
            </div>
        </nav>
    </header>
    <hr>
    <div class="container mt-5">
    <h1>Skill taxonomy</h1>    
    <br>
    <hr>
    <div class="text-center font-weight-bold">
        @if(session()->has('Sucess'))
            <div>
                {{session('Sucess')}}
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <h2>Taxonomy Overview</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Skills</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->Role }}</td>
                        <td>
                            @foreach($role->skills as $skill)
                                <span class="badge badge-info">{{ $skill->Name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($role->tools as $tool)
                                <span class="badge badge-primary">{{ $tool->Name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    @section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @endsection
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>