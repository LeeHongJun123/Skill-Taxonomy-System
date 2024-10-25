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

        .scaled-image {
            max-width: 35%; /* Set maximum width */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="{{route('erole.index')}}">Home</a>
        <a href="{{route('profile.index')}}">Profile</a>
        <a href="{{route('erole.viewtaxonomy')}}">View Skill Taxonomy </a>
        <a href="{{route('history.index')}}">Career History</a>
        <a href="{{route('password.change')}}">Change Password</a>
        <br>
        <form action="{{route('acc.logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">logout</button>
        </form>
    </div>

<div class="main-content">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-text">
                Employee , {{Auth::user()->name}}
            </span>
          </div>
        </div>
      </nav>

    <img src="https://blog.degreed.com/wp-content/uploads/2023/03/Skills-Taxonomy_Blog-Header-1200x1200-1.png" class="img-fluid scaled-image mx-auto d-block" alt="Responsive image">

    <div class="container mt-5 px-4"> 
        <div class="text-center font-weight-bold"> 
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