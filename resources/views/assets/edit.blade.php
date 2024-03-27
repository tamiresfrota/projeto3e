@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-size: 30px; color: #333; margin: 20px 20px;">Edite um ativo</h1>

        <form action="{{ route('assets-update', ['id' => $asset->id]) }}" method="POST">

        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" value="{{ $asset->name }}" class="form-control" placeholder="Digite um nome para o ativo">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="category">Categoria:</label>
                        <input type="text" name="category" value="{{ $asset->category }}"
                        class="form-control" placeholder="Digite um nome para o ativo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="type_id">Tipos:</label>
                        <select name="type_id" id="type_id" class="form-select" required>
                            <option>Selecione um tipo</option>
                            @foreach($types as $type)
                            <option <?= $asset->type_id == $type->id ? 'selected' : '' ?> value="{{ $type->id }}"> {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="acquisition_date">Data de Aquisição:</label>
                        <input type="date" name="acquisition_date"
                        value="{{ $asset->acquisition_date->format('Y-m-d') }}" id="acquisition_date" class="form-control" placeholder="Digite a data de aquisição">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="value">Valor:</label>
                        <input type="number" name="value" value="{{ $asset->value }}" class="form-control" placeholder="Digite o valor">
                    </div>
                </div>
            </div>
                <div class="col-12 col-sm-9">
                    <div class="form-group">
                        <label for="description" class="form-label">Descrição:</label>
                        <input type="text" name="description" value="{{ $asset->description }}" class="form-control" placeholder="Digite uma descrição para o ativo">
                    </div>
                </div>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Rua:</label>
                        <input type="text" name="street" value="{{ $locations->street }}"class="form-control" placeholder="Enter street">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Número:</label>
                        <input type="text" name="number" value="{{ $locations->number }}" class="form-control" placeholder="Enter number">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Bairro:</label>
                        <input type="text" name="neighborhood" value="{{ $locations->neighborhood }}" class="form-control" placeholder="Enter neighborhood">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Cidade:</label>
                        <input type="text" name="city" value="{{ $locations->city }}" class="form-control" placeholder="Enter city">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Estado:</label>
                        <input type="text" name="state" value="{{ $locations->state }}" class="form-control" placeholder="Enter state">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">País:</label>
                        <input type="text" name="country" value="{{ $locations->country }}" class="form-control" placeholder="Enter country">
                    </div>
                </div>
                <input type="hidden" name="location_id" value="{{ $asset->location_id }}">
                <div class="form-group">
                <button type="submit" class="btn btn-dark" style="margin-top: 10px; margin-bottom: 10px;">Atualizar</button>
                </div>
            </div>
            </form>
        
    </div>
@endsection
