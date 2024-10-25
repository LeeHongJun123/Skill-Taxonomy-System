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
            left: 2px;
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

        .scaled-image {
            max-width: 35%; /* Set maximum width */
            height: auto; /* Maintain aspect ratio */
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
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>Welcome Human Resource - , {{Auth::user()->name}}<h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Navigation links can go here -->
            </div>
        </nav>
    </header>

    <img src="https://blog.degreed.com/wp-content/uploads/2023/03/Skills-Taxonomy_Blog-Header-1200x1200-1.png" class="img-fluid scaled-image mx-auto d-block" alt="Responsive image">

    <div class="container mt-5 px-4"> <!-- Add px-4 class for left and right padding -->
        <div class="text-center font-weight-bold"> <!-- Center-align the content and make it bold -->
            <h3>Welcome to Skill Taxonomy System</h3>
        </div>


        <p>A skill taxonomy system for IT categorizes technical abilities 
            into hierarchical structures, enabling efficient organization
             and assessment of competencies across domains like programming, 
             networking, cybersecurity, database management, and system
              administration.
        </p>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <br>
    <br>
    <hr>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
