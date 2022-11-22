@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Oroscopo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Segno</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($horoscopes as $horoscope)
                        <tr>
                            <th scope="row">{{$horoscope->id}}</th>
                            <td>{{$horoscope->horoscope}}</td>
                            <td>{{$horoscope->date}}</td>
                            <td>{{$horoscope->sign}}</td>
                        </tr> 
                        @empty
                            <tr>
                                <td colspan="7">
                                    <h3 class="text-center">Nessun oroscopo</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
            
                  <nav class="mt-3">
                    @if ($horoscopes->hasPages())
                        {{$horoscopes->links()}}
                    @endif
                  </nav>
            </div>
        </div>
    </div>
</div>
@endsection
