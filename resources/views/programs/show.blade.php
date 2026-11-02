<!DOCTYPE html>
<html>
<head>
    <title>View Program - Cultural Program Announcer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Program Details</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $program->program_name }}</h5>
                <p class="card-text"><strong>Type:</strong> {{ $program->type }}</p>
                <p class="card-text"><strong>Venue:</strong> {{ $program->venue }}</p>
                <p class="card-text"><strong>Date:</strong> {{ date('M d, Y', strtotime($program->date)) }}</p>
                
                <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>