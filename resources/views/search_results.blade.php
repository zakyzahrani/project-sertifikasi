@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Hasil Pencarian untuk "{{ $query }}"</h2>

        <div class="row mt-4">
            @foreach ($cars as $car)
                <!-- Tampilkan hasil pencarian -->
                <div class="col-lg-4 col-sm-6 mt-4">
                    <!-- ... -->
                </div>
            @endforeach
        </div>
    </div>
@endsection