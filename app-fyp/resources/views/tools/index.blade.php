<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('role.index')}}">Role</a>
        <a href="{{route('skill.index')}}">Skill</a>
        <a href="{{route('tool.index')}}">Tool</a>
        <a href="{{route('password.change')}}">Change Password</a>
        <a href="{{route('view.profile')}}">Employee</a>
        <form action="{{route('acc.logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">logout</button>
        </form>
    </div>

<div class="main-content">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>Skill Taxonomy System , {{Auth::user()->name}}<h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navigation links can go here -->
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Tools Management</h1>    
        <br>
        <hr>
        <a href="{{ route('tool.create') }}" class="btn btn-primary">Add New Tools</a>
        <div class="text-center font-weight-bold">
            @if(session()->has('Sucess'))
                <div>
                    {{session('Sucess')}}
                </div>
            @endif
        </div>
        <hr>
        <div class="container mt-5">
            <h2>Tools Overview</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tools as $tool)
                        <tr>
                            <td>{{ $tool->id }}</td>
                            <td>{{ $tool->Name }}</td>
                            <td>{{ $tool->Description }}</td>
                            <td>
                                <a href="{{route('tool.edit',['tool' => $tool])}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form method='post' action='{{route('tool.delete', ['tool'=>$tool])}}'>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value='Delete' />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>