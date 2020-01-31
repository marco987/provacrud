@extends('layout.layout-base')

@section('content')

    <form action="{{Route('store.employee')}}" method="post">
        @csrf
        @method('POST')

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="">
        <label for="cognome">Cognome</label>
        <input type="text" name="cognome" value="">

        <select name="department_id">

        @foreach ($reparti as $reparto)

            <option value="
                @switch($reparto)
                    @case("Marketing")
                    '1'
                    @break

                    @case("SEO")
                    '2'
                    @break

                    @case("Social")
                    '3'
                    @break

                    @case("Design")
                    '4'
                    @break

                    @case("Development")
                    '5'
                    @break

                    @default
                    ''
                @endswitch
            ">{{$reparto}}</option>

        @endforeach

        </select>

        <label for="matricola" style="display:none"></label>
        <input type="text" name="matricola" value="{{$nuovaMatricola}}" style="display:none">

        <button type="submit">INSERISCI</button>

    </form>

@endsection