<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Taxonomy System</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
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
                <a class="navbar-brand">Skill Taxonomy </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation links can go here -->
                </div>
            </nav>
        </header>

        <div class="container mt-5">
            <h1>Career History</h1>    
            <div>
                @if($errors->any())
                <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                </ul>
                @endif
                

                <form action="{{ route('career_histories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Job title</label>
                        <input type="text" name="job_title" id="job_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="years">years</label>
                        <input type="text" name="years" id="years" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <select name="skills[]" id="skills" class="form-control select2" multiple="multiple" required>
                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="tools">Tools</label>
                        <select name="tools[]" id="tools" class="form-control select2" multiple="multiple" required>
                            @foreach($tools as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <br>
                    <div>
                        <input type="submit" class="btn btn-primary" value='Add To History'/>
                    </div>
                </form>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>
</html>
