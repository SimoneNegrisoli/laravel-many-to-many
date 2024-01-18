@extends('layouts.app');
@section('content')
    <section class="container">
        <h2>Technologies Creation</h2>
        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                {{-- TITLE --}}
                <label for="name">Titolo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required maxlength="200" minlength="3" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">invia</button>
            <button type="reset">reset</button>

        </form>
    </section>
@endsection
