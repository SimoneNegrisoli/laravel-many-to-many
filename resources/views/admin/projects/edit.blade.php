@extends('layouts.app')
@section('content')
    <section class="container">
        <h2>Edit {{ $project->title }}</h2>
        <form action="{{ route('admin.projects.update', $project->slug) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            {{-- TITLE --}}
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    required minlength="3" maxlength="200" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- TYPE --}}
            <div class="mb-3">

                <label for="type_id">Select Type</label>
                <select class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BODY --}}
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30"
                    rows="10">
                {{ old('body', $project->body) }}
                </textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- IMG --}}
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- BTN --}}
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>

        </form>
        <div class="mt-2">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark ">Torna ai progetti</a>
        </div>
    </section>
@endsection
