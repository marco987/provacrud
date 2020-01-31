@extends('layout.layout-base')

@section('content')

    <p>ATTENZIONE: Non è possibile modificare il numero di matricola ({{$employee -> matricola}})</p>
    <form action="{{Route('update.employee', $employee -> id)}}" method="post">
        @csrf
        @method('POST')

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="{{$employee -> nome}}">
        <label for="cognome">Cognome</label>
        <input type="text" name="cognome" value="{{$employee -> cognome}}">

        <select name="department_id">

            @foreach ($reparti as $reparto)

            <option value="
                @switch($reparto)
                    @case("Marketing")
                    1
                    @break

                    @case("SEO")
                    2
                    @break

                    @case("Social")
                    3
                    @break

                    @case("Design")
                    4
                    @break

                    @case("Development")
                    5
                    @break

                    @default
                    ''
                @endswitch
            ">{{$reparto}}</option>

        @endforeach
    
        </select>

        <label for="matricola" style="display:none"></label>
        <input type="text" name="matricola" value="{{$employee -> matricola}}" style="display:none">

        <button type="submit">AGGIORNA</button>

    </form>

@endsection