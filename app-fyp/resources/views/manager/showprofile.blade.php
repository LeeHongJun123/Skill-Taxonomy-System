<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System - View Employee Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <style>
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
            margin-left: 200px;
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
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('role.index') }}">Role</a>
        <a href="{{ route('skill.index') }}">Skill</a>
        <a href="{{ route('tool.index') }}">Tool</a>
        <a href="{{route('password.change')}}">Change Password</a>
        <a href="{{ route('view.profile') }}">Employee</a>
        <form action="{{ route('acc.logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>

    <div class="main-content">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand">Skill Taxonomy</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation links can go here -->
                </div>
            </nav>
        </header>

        <div class="container mt-5">   
            <div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <h1>Employee Profile</h1>
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('view.profile') }}" class="btn btn-outline-success mr-2">Back</a>
                    <a href="{{ route('profile.pdf', $user->id) }}" class="btn btn-outline-success">Print Profile</a>
                </div>
                
                <div class="text-center font-weight-bold">
                    @if(session()->has('Success'))
                        <div>{{ session('Success') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->profile->first_name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->profile->last_name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="Current_role">Current Role</label>
                    <input type="text" name="Current_role" id="Current_role" class="form-control" value="{{ $user->profile->Current_role }}" readonly>
                </div>

                <div class="form-group">
                    <label for="Education">Education</label>
                    <input type="text" name="Education" id="Education" class="form-control" value="{{ $user->profile->Education }}" readonly>
                </div>

                <div class="form-group">
                    <label for="current_comp">Current Company</label>
                    <input type="text" name="current_comp" id="current_comp" class="form-control" value="PCCW SOLUTION sdn.bhd" readonly>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <label for="status">Status</label>
                        <span class="badge bg-success">{{ $user->profile->status }}</span>
                    </div>
                </div>
                <br>
                <hr>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <td>Skills</td>
                                <td>Tools</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>
                                    <div>
                                        @foreach($user->skills as $skill)
                                            <span class="badge bg-info">{{ $skill->Name }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @foreach($user->tools as $tool)
                                            <span class="badge bg-primary">{{ $tool->Name }}</span>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    @section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
