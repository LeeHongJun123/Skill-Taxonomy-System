<!-- resources/views/manager/viewcareer.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System - View User Career History</title>
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
                </div>
            </nav>
        </header>

        <div class="container mt-5">
            <h1>Career History of {{ $user->name }}</h1>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Company Name</th>
                            <th>Job Title</th>
                            <th>Years</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Skills</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->careerHistories as $history)
                            <tr>
                                <td>{{ $history->company_name }}</td>
                                <td>{{ $history->job_title }}</td>
                                <td>{{ $history->years }}</td>
                                <td>{{ $history->start_date }}</td>
                                <td>{{ $history->end_date }}</td>
                                <td>
                                    @foreach($history->skills as $skill)
                                        <span class="badge bg-info">{{ $skill->Name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($history->tools as $tool)
                                        <span class="badge bg-primary">{{ $tool->Name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('view.profile') }}" class="btn btn-outline-success">Back</a>
            <a href="{{ route('career-history.pdf', $user->id) }}" class="btn btn-outline-success">Print Career History</a>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
