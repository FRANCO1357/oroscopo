@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (count($horoscopes))
            
            {{-- card inserimento data di nascita --}}
            <div class="card">
                <div class="card-header">
                    <h3>Inserisci la tua data di nascita per visualizzare tutti gli oroscopi del tuo segno</h3>
                </div>
                <div class="card-body">
                    <form action="/admin" method="GET">
                        @csrf
                        <div class="form-group d-flex">
                            <input class="form-control" style="width: 150px" type="date" name="date" value="{{$date}}">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div> 
            </div>
            
            {{-- se è stata selezionata la data mostro in pagina gli oroscopi --}}
            @if ($date)
            <h3 class="py-4 text-white">Di seguito tutti gli oroscopi del segno: <strong>{{$sign}}</strong></h3>

            <table class="table table-striped table-light">
                <thead>
                  <tr>
                    <th scope="col">Oroscopo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Segno</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($horoscopes as $horoscope)
                    <tr>
                        <td>{{$horoscope->horoscope}}</td>
                        <td>{{$horoscope->date}}</td>
                        <td>{{$horoscope->sign}}</td>
                    </tr> 
                    @empty
                        {{-- se non c'è nessun oroscopo --}}
                        <tr>
                            <td colspan="7">
                                <h3 class="text-center">Nessun oroscopo</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
              </table>

              {{-- link paginazione --}}
              <nav class="mt-3">
                @if ($horoscopes->hasPages($sign))
                    {{$horoscopes->appends(['date' => $date])->links()}}
                @endif
              </nav>
            @endif
            
            @else
                
            <div class="card">
                <div class="card-header">
                    <h3>Nessun file oroscopo importato</h3>
                </div>
                <div class="card-body">
                    <span>Clicca qui per importarlo</span>
                    <a class="btn btn-primary ml-3" href="{{ route('admin.horoscopes.import') }}">Importa</a>
                </div>
            </div>
            
            @endif
              
        </div>
    </div>
</div>
@endsection
