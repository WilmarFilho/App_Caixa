@extends('layouts.app')

@section('content')

    <home-component titulo='Detalhes do Cliente'>
    
        <h4>{{$cliente->nome}}</h4>
        <h4>{{$cliente->nome_comercial}}</h4>
        <h4>{{$cliente->endereco}}</h4>
        <h4>{{$cliente->numero}}</h4>
        <h4>{{$cliente->saldo}}</h4>

        <?php if(isset($vendas)) { ?>

            <table class="table mt-2">
                    <thead>
                        <tr>
                            <td scope="col">NOME</th>
                            <td scope="col">VALOR</th>
                            <td scope="col">PAGAMENTO</th>
                            <td scope="col">SITUAÇÂO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendas as $key => $venda)
                            <tr>
                                <td >{{$venda->Produto->nome}}</th>
                                <td>{{$venda->valor}}</td>
                                <td>{{$venda->pagamento}}</td>
                                <?php if($venda->pagamento == 'A vista') { ?>
                                    <td>Quitado</td>
                                <?php } ?>
                                <?php if($venda->pagamento == 'A prazo') { ?>
                                    <td><a class='btn btn-primary'>Quitar</a></td>
                                <?php } ?>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        <?php } ?>
    
    </home-component> 

   

@endsection
