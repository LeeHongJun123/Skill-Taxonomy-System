<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career History of {{ $user->name }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .table { width: 100%; border-collapse: collapse; }
        .table, .table th, .table td { border: 1px solid black; }
        .table th, .table td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Career History of {{ $user->name }}</h1>
    <table class="table">
        <thead>
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
                            <span>{{ $skill->Name }}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($history->tools as $tool)
                            <span>{{ $tool->Name }}</span><br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
