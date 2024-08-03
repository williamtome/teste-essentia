@extends('layouts.app')

@section('content')

<div class="mt-4">
    <h1>Index - Clientes</h1>

    <a class="btn btn-primary my-3" href="{{ route('customers.create') }}">Novo cliente</a>

    <table class="table table-hover my-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td class="d-flex">
                    <a class="btn btn-primary mx-2" href="{{ route('customers.edit', $customer->id) }}">Editar</a>
                    <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger mx-2" type="submit">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
