@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-items-center  pt-4">
            <h1>technology list</h1>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success ">Aggiungi nuovo progetto</a>
        </div>
        <table class="table table-striped mt-4">
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td class="align-middle">{{ $technology->name }}</td>
                        <td class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('admin.technologies.show', $technology->slug) }}"
                                class="btn btn-success mx-2">Mostra</a>

                            <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary cancel-button"
                                    data-item-title="{{ $technology->name }}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
    @include('partials.modal_delete');
@endsection
