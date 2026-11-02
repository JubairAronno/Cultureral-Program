<!DOCTYPE html>
<html>
<head>
    <title>Edit Program - Cultural Program Announcer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Program</h1>
        
        <form action="{{ route('programs.update', $program->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="program_name" class="form-label">Program Name</label>
                <input type="text" class="form-control" id="program_name" name="program_name" value="{{ $program->program_name }}" required>
            </div>
            
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="Music" {{ $program->type == 'Music' ? 'selected' : '' }}>Music</option>
                    <option value="Dance" {{ $program->type == 'Dance' ? 'selected' : '' }}>Dance</option>
                    <option value="Drama" {{ $program->type == 'Drama' ? 'selected' : '' }}>Drama</option>
                    <option value="Exhibition" {{ $program->type == 'Exhibition' ? 'selected' : '' }}>Exhibition</option>
                    <option value="Workshop" {{ $program->type == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="Other" {{ $program->type == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" class="form-control" id="venue" name="venue" value="{{ $program->venue }}" required>
            </div>
            
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $program->date }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Program</button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>