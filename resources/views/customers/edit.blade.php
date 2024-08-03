@extends('layouts.app')

@section('content')

<div class="mt-4">
    <h1>Editar Cliente</h1>

    <form method="post" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row g-2 align-items-center mt-3">
            @if (!is_null($customer->image_url))
                <img src="{{ asset('storage/'.$customer->image_url) }}" class="rounded float-start" alt="...">
            @endif
            <div class="mb-3 col-6">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Informe seu nome" value="{{ old('name', $customer->name) }}">
            </div>
            <div class="mb-3 col-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="example@test.com" value="{{ old('email', $customer->email) }}" />
            </div>
        </div>
        <div class="row g-2 align-items-center mt-3">
            <div class="mb-3 col-6">
                <label for="phone" class="form-label">Telefone</label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" />
            </div>
            <div class="mb-3 col-6">
                <label for="image" class="form-label">Foto</label>
                <input type="file" name="avatar" class="form-control" accept="image/jpegg,image/png" />
            </div>
        </div>
        <div class="row g-2 align-items-center mt-3">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
            <a  class="btn btn-default" href="{{ route('customers.index') }}">Cancelar</a>
        </div>
    </form>
</div>

@endsection
