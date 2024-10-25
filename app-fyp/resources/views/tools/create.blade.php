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
            <a class="navbar-brand" href="#">Skill Taxonomy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container-fluid">
                    <span class="navbar-text">
                      Navbar text with an inline element
                    </span>
                  </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>Adding New Tool</h1>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form method='post' action="{{ route('tool.store') }}" >
            @csrf
            @method('post')

            <div>
                <label>Tool Name</label>
                <input type="text" class="form-control" name='Name' placeholder="Example: Django ">
            </div>
            <div class="form-group">
                <label>Tool Description</label>
                <textarea class="form-control" name='Description' rows="3"></textarea>
            </div>
            <br>
            <br>
            <hr>
            <br>
            <div>
                <input type="submit" class="btn btn-primary" value='Add Tool'/>
            </div>
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    <hr>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
