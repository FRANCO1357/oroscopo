@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importa l'oroscopo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- form importazione file --}}
                    <form action="/admin/horoscopes/import" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-primary">Importa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection