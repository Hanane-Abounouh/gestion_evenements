<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Event</h2>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Title</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="heure" class="form-label">Time</label>
            <input type="time" class="form-control" id="heure" name="heure" required>
        </div>
        <div class="mb-3">
            <label for="lieu" class="form-label">Location</label>
            <input type="text" class="form-control" id="lieu" name="lieu" required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Price</label>
            <input type="text" class="form-control" id="prix" name="prix" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

</body>
</html>