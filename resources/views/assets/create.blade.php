@extends('layouts.app')

@section('content')
<h1 style="font-size: 30px; color: #333; margin: 20px 20px;" >Crie um novo ativo</h1>
    <div class="container">
            
            <form action="{{ route('assets-store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" placeholder="Digite um nome para o ativo">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <label for="category">Categoria:</label>
                        <input type="text" name="category" class="form-control" placeholder="Digite uma categoria para o ativo">
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
                                <option value="{{ $type->id }}"> {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="acquisition_date">Data de Aquisição:</label>
                        <input type="date" name="acquisition_date" id="acquisition_date" class="form-control" placeholder="Digite a data de aquisição">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="value">Valor:</label>
                        <input type="number" name="value" class="form-control" placeholder="Digite o valor">
                    </div>
                </div>
            </div>
                <div class="col-12 col-sm-9">
                    <div class="form-group">
                        <label for="description" class="form-label">Descrição:</label>
                        <input type="text" name="description" class="form-control" placeholder="Digite uma descrição para o ativo">
                    </div>
                </div>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Rua:</label>
                        <input type="text" name="street" value="{{ $locations->first()->street ?? '' }}"class="form-control" placeholder="Digite a rua">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Número:</label>
                        <input type="text" name="number" value="{{ $locations->first()->number ?? '' }}" class="form-control" placeholder="Digite o número">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Bairro:</label>
                        <input type="text" name="neighborhood" value="{{ $locations->first()->neighborhood ?? '' }}" class="form-control" placeholder="Digite o bairro">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Cidade:</label>
                        <input type="text" name="city" value="{{ $locations->first()->city ?? '' }}" class="form-control" placeholder="Digite a cidade">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">Estado:</label>
                        <input type="text" name="state" value="{{ $locations->first()->state ?? '' }}" class="form-control" placeholder="Digite o estado">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <div class="form-group">
                        <label for="location_id">País:</label>
                        <input type="text" name="country" value="{{ $locations->first()->country ?? '' }}" class="form-control" placeholder="Digite o país">
                    </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">Criar</button>
                </div>
            </div>
            </form>
        
    </div>
@endsection
