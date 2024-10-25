<!-- resources/views/manager/showprofile_pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">   
        <div>
            <h1>Employee Profile</h1>
            
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
</body>
</html>
