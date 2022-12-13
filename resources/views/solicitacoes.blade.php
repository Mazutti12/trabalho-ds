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
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitacoes as $sol)
            <tr>
                <td>{{ $sol->nome_servico }}</td>
                <td>{{ $sol->data }}</td>
                <td>{{ $sol->horario }}</td>
                <td>{{ $sol->usuario_id }}</td>
                @if ($sol->admin === 0)
                <td>
                    <a href="/solicitacoes/aceita/{{ $sol->pedido_id }}" style="border: none"><i class="bi bi-check2"></i></a>
                    <a href="/solicitacoes/recusa/{{ $sol->pedido_id }}" style="border: none"><i class="bi bi-x-lg"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
