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


            {{-- TECHNOLOGY --}}
            <div class="mb-3">
                <div class="form-group">
                    <h6>Select technologies</h6>
                    @foreach ($technologies as $technology)
                        <div class="form-check @error('technologies') is-invalid @enderror">
                            @if ($errors->any())
                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                    value="{{ $technology->id }}"
                                    {{ in_array($technology->id, old('technologies', $project->technologies)) ? 'checked' : '' }}>
                            @else
                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                    value="{{ $technology->id }}"
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                            @endif
                            <label class="form-check-label">
                                <label class="form-check-label">
                                    {{ $technology->name }}
                                </label>
                        </div>
                    @endforeach
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- IMG --}}
            <div class="d-flex">
                <div class="media me-4">
                    <img class="shadow" width="150" src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}">
                </div>
                <div class="mb-3 w-100">
                    <label for="image">Image</label>
                    <input type="file" class="form-control   @error('image') is-invalid @enderror" name="image"
                        id="image" value="{{ old('image', $project->image) }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            {{-- BTN --}}
            <div class="d-flex justify-content-between align-item-center">
                <div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>

                <div>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger cancel-button"
                            data-item-title="{{ $project->title }}"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>

            </div>


        </form>




        <div class="mt-2">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark ">Torna ai progetti</a>
        </div>
    </section>
    @include('partials.modal_delete');
@endsection
