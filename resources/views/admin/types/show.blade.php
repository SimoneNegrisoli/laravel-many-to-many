@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between pt-4">
            <h2>{{ $type->name }}</h2>
            <div>
                <a href="{{ route('admin.types.edit', $type->slug) }}" class="btn btn-success ">Modifica <i
                        class="fa-solid fa-pencil"></i></a>
            </div>
        </div>
        <div>
            <ul>
                @foreach ($type->projects as $project)
                    <li>
                        {{ $project->title }}
                    </li>
                @endforeach
            </ul>

        </div>

        <div>
            <a href="{{ route('admin.types.index') }}" class="btn btn-dark ">Torna ai progetti</a>
        </div>
    </section>
@endsection
