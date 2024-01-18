@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between pt-4">
            <h2>Project detail</h2>
            <div>
                <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-success ">Modifica <i
                        class="fa-solid fa-pencil"></i></a>
            </div>
        </div>
        <h3>{{ $project->title }}</h3>
        <div>
            <span class="">{{ $project->type ? $project->type->name : '' }}</span>
        </div>
        <div><img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"></div>
        <p>{{ $project->body }}</p>
        <div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark ">Torna ai progetti</a>
        </div>
    </section>
@endsection
