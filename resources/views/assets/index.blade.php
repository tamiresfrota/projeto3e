@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-sm-0 col-md-9">
        <h1 style="font-size: 30px; color: #333; margin: 20px 20px;">Lista de Ativos</h1>
        </div>
        <div class="col-md-sm-12 col-md-3">
            <form action="{{ route('assets-index') }}" method="GET">
                <div class="input-group mb-3 mt-2">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Pesquisar" value="{{ $search }}">
                    <button type="submit" class="btn btn-primary" aria-label="Pesquisar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                    <a href="{{ route('assets-index') }}" class="btn btn-danger" aria-label="Limpar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </a>
                </div>
            </form>
        </div>

    </div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data de Aquisição</th>
            <th scope="col">Valor</th>
            <th scope="col">Localização</th>
            <th scope="col">Editar</th>
            <th scope="col">Deletar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($assets as $asset)
            <tr>
            <th>{{ $asset->id }}</th>
            <th>{{ $asset->name }}</th>
            <th>{{ $asset->category }}</th>
            <th>{{ $asset->type->name }}</th>
            <th>{{ $asset->description }}</th>
            <th>{{ $asset->acquisition_date->format('d/m/Y') }}</th>
            <th>{{ number_format($asset->value, 2, ',', '.') }}</th>
            <th>{{ $asset->location->street }}, {{ $asset->location->number }}, {{ $asset->location->neighborhood }}, {{ $asset->location->city }}, {{ $asset->location->state }}, {{ $asset->location->country }}</th>
            <th>
                <a href="{{ route('assets-edit', ['id'=>$asset->id]) }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    </svg>
                </a>
            </th>
            <th>
                <form action="{{ route('assets-destroy', ['id'=>$asset->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </form>
            </th>
            </tr>
        @endforeach
        </tbody>
        </table>
</div>
@endsection
