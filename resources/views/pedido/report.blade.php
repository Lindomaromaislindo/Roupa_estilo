<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Pedidos</title>
</head>
<body>
    <h2>Relatório de Pedidos</h2>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Data</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido as $pedido)
                <tr>
                    <td>{{ $pedido->codigo }}</td>
                    <td>{{ \Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>