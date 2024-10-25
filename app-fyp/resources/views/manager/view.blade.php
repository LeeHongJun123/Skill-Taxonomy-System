<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profiles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<div class="main-content">
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

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h2>Skill Taxonomy System, {{ Auth::user()->name }}</h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"></div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>Employee Profiles</h1>
        
        <form action="{{ route('manager.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="Search by name, skill, or tool" value="{{ request('query') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Employee First Name</th>
                    <th>Employee Last Name</th>
                    <th>Current Job Title</th>
                    <th>Status</th>
                    <th>Skills</th>
                    <th>Tools</th>
                    <th>View Profile</th>
                    <th>View Past Career</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->first_name }}</td>
                    <td>{{ $profile->last_name }}</td>
                    <td>{{ $profile->Current_role }}</td>
                    <td>
                        @if($profile->status == 'Active')
                            <span class="badge rounded-pill bg-success">Active</span>
                        @elseif($profile->status == 'Inactive')
                            <span class="badge rounded-pill bg-secondary">Inactive</span>
                        @elseif($profile->status == 'Suspended')
                            <span class="badge rounded-pill bg-warning">Suspended</span>
                        @else
                            <span class="badge rounded-pill bg-danger">Unknown</span>
                        @endif
                    </td>
                    <td>
                        @foreach ($profile->user->skills as $skill)
                            <span class="badge bg-info">{{ $skill->Name }}</span>
                        @endforeach
                        @foreach ($profile->user->careerHistories as $history)
                            @foreach ($history->skills as $skill)
                                <span class="badge bg-info">{{ $skill->Name }}</span>
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        @foreach ($profile->user->tools as $tool)
                            <span class="badge bg-primary">{{ $tool->Name }}</span>
                        @endforeach
                        @foreach ($profile->user->careerHistories as $history)
                            @foreach ($history->tools as $tool)
                                <span class="badge bg-primary">{{ $tool->Name }}</span>
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('manager.employees.profile', $profile->user->id) }}" class="btn btn-info">View Profile</a>
                    </td>
                    <td>
                        <a href="{{ route('manager.users.career-history', $profile->user->id) }}" class="btn btn-info">View Career History</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</div>

<footer class="footer">
    <p>&copy; 2024 Your Company. All rights reserved.</p>
</footer>
</body>
</html>
