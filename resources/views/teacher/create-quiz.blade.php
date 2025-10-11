@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Create New Quiz</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('teacher.quiz.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Quiz Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="time_limit" class="form-label">Time Limit (minutes, optional)</label>
                        <input type="number" class="form-control" id="time_limit" name="time_limit" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Quiz</button>
                    <a href="{{ route('teacher.dashboard') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection