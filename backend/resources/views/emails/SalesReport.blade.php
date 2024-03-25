<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Vendas</title>
</head>

<body>
    <h3>Relatório de Vendas do dia  {{ \Carbon\Carbon::now()->format('d/m/Y ') }}</h3>


    <table border="1">
        <thead>
            <tr>
                <th>Vendedor</th>
                <th>Data</th>
                <th>Comissão</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->seller_name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>{{ $sale->commission }}</td>
                <td>{{ $sale->sale_value }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total:</th>
                <td>{{ $totalSales }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
