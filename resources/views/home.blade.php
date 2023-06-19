@extends('layouts.app')

@section('content')

    <home-component titulo='Controle do caixa'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#consulta_d" class='btn btn-success m-2'>Consulta Diaria</button>
        <!-- Btn para gerar a lista do mês atual -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#consulta" class='btn btn-warning m-2'>Consulta Mensal</button>
        
        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>
    
        <?php
        
            if(isset($vendas)) {
                
                $totalVendas = 0;
                $totalDespesas = 0;

                foreach($vendas as $venda) {
                    $totalVendas = $totalVendas + $venda->valor;
                }

                foreach($despesas as $despesa) {
                    $totalDespesas = $totalDespesas + $despesa->valor;
                }

            }
        
        ?>

        <?php if(isset($vendas)) { ?>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">Faturamento</th>
                        <td scope="col">Gastos</th>
                        <td scope="col">Lucro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id='faturamento'>{{$totalVendas}}</th>
                        <td id='gastos'>{{$totalDespesas}}</td>
                        <td id='lucro'>{{$totalVendas - $totalDespesas}}</td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>
    
    </home-component>

    <add-component metodo='POST' btn='Consultar' id='consulta' titulo='Escolha o mês desejado para gerar o relatorio' rota='{{route('relConsul')}}' token_csrf='{{csrf_token()}}'>

        <select-component label='Selecione um mês' name='mes'></select-component>
    
    </add-component>

    <add-component metodo='POST' btn='Consultar' id='consulta_d' titulo='Escolha o dia desejado para gerar o relatorio' rota='{{route('relAtual')}}' token_csrf='{{csrf_token()}}'>

        <input-component type='date' label='Selecione o dia' name='dia'></input-component>
    
    </add-component>

@endsection
