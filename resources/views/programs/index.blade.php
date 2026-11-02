<!DOCTYPE html>
<html>
<head>
    <title>Cultural Program Announcer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cultural Program Announcer</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">Add New Program</a>
        
        @if(count($programs) > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Program Name</th>
                    <th>Type</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <td>{{ $program->program_name }}</td>
                    <td>{{ $program->type }}</td>
                    <td>{{ $program->venue }}</td>
                    <td>{{ date('M d, Y', strtotime($program->date)) }}</td>
                    <td>
                        <a href="{{ route('programs.show', $program->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-info">
                No programs found. <a href="{{ route('programs.create') }}">Add your first program!</a>
            </div>
        @endif
    </div>
</body>
</html>