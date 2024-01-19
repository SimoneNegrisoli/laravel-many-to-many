@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between pt-4">
            <h2>{{ $technology->name }}</h2>
            <div>
                <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-success ">Modifica <i
                        class="fa-solid fa-pencil"></i></a>
            </div>
        </div>
        <div>
            @if ($technology->projects)
                <ul>
                    @foreach ($technology->projects as $project)
                        <li>
                            <a href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>

        <div>
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark ">Torna ai progetti</a>
        </div>
    </section>
@endsection
