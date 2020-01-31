@extends('layout.layout-base')

@section('content')

    <h2 style="text-align:center">Lista dipendenti</h2>
    <h4 style="text-align:center"><a href="{{Route('create.employee')}}">Inserisci nuovo dipendente</a></h4>

    @foreach ($employees as $employee)
        <div>
            <p>
                Nome e Cognome: {{$employee -> nome}} {{$employee -> cognome}}<br>
                Reparto: {{$employee -> department -> reparto}}<br>
                Matricola: {{$employee -> matricola}}<br>
                <a style="font-weight:bold" href="{{Route('edit.employee', $employee -> id)}}">Modifica dipendente</a><br>
                <a style="font-weight:bold" href="{{Route('destroy.employee', $employee -> id)}}">Cancella dipendente</a><br><br>
            </p>
        </div>
    @endforeach

@endsection