<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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
            <h1>Career History: {{ Auth::user()->name }}</h1>    
            <div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                
                    @csrf
                    @method('PUT')

                    <div class="text-center font-weight-bold">
                        @if(session()->has('success'))
                            <div>{{ session('success') }}</div>
                        @endif
                        @if(session()->has('error'))
                            <div>{{ session('error') }}</div>
                        @endif
                    </div>

                    <a href="{{ route('history.create') }}" class="btn btn-primary">Add New History</a>
                
                    <div class="container mt-5">
                        <h2>Career History Overview</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Company name</th>
                                        <th>Job Title</th>
                                        <th>Years</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Skills</th>
                                        <th>Tools</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($history as $item)
                                    <tr>
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->job_title }}</td>
                                        <td>{{ $item->years }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>
                                            @foreach($item->skills as $skill)
                                                <span class="badge badge-info">{{ $skill->Name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($item->tools as $tool)
                                                <span class="badge badge-primary">{{ $tool->Name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('career_histories.edit', ['history' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                        </td>                                        
                                        <td>
                                            <form method="POST" action="{{ route('history.delete', ['history' => $item->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
               
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
