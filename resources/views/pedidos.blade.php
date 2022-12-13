@extends('principal.header')

@section('container')

@extends('components.navBar')

<div class="container">
    <table class="table table-striped full">
        <thead>
            <tr>
                <th>Nome Serviço</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Cliente</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->nome_servico }}</td>
                <td>{{ $pedido->data }}</td>
                <td>{{ $pedido->horario }}</td>
                <td>{{ $pedido->usuario_id }}</td>
                <td>{{ $pedido->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
