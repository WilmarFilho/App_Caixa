@extends('layouts.app')

@section('content')

    <home-component titulo='Detalhes do Cliente'>

        <form class='form-control'>
            <div class='justify-content-between d-flex'>
                <label>Nome:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$cliente->nome}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Comercio:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$cliente->nome_comercial}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Endereço:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$cliente->endereco}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Número:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$cliente->numero}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Saldo:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$cliente->saldo}}'>
            </div>
        </form>

        <button type="button" data-bs-toggle="modal" data-bs-target="#EditaDados" class='btn btn-success mt-5'>Editar Cliente</button>

        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-2 mb-5" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component metodo='GET' token_csrf='{{csrf_token()}}' rota={{route('cliente.edit', $cliente->id)}} btn='Alterar' titulo='Editar cliente' id='EditaDados'>
        
            <input-component valor='{{$cliente->nome}}' type='name' label='Informe o nome do cliente' name='nome'></input-component>
            <input-component valor='{{$cliente->nome_comercial}}' type='name' label='Informe o nome comercial do cliente' name='nome_comercial'></input-component>
            <input-component valor='{{$cliente->endereco}}' type='name' label='Informe o endereço do cliente' name='endereco'></input-component>
            <input-component valor='{{$cliente->cidade}}' type='name' label='Informe a cidade do cliente' name='cidade'></input-component>

            <label class='mt-2'>Escolha o Estado do cliente:</label>

            <select value='{{$cliente->estado}}' name='estado' class="form-control mt-2">
            
                <option>GO</option>
                <option>MT</option>
                <option>BA</option>
            
            </select>

            <input-component valor='{{$cliente->numero}}' step='any' type='number' label='Informe o número do cliente' name='numero'></input-component>

            <input-component valor='{{$cliente->saldo}}' step='any' type='number' label='Informe o saldo devedor do cliente' name='saldo'></input-component>

            <input-component valor='{{$cliente->id}}' step='any' type='hidden'  name='cliente'></input-component>

        </add-component>

        <h3 class='mt-4 mb-5'> Suas Vendas: </h3>

        <?php if(isset($vendas)) { ?>

            <table class="table mt-2">
                    <thead>
                        <tr>
                            <td scope="col">PRODUTO</th>
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
                                    <td><a href={{route('quitaVenda', [$venda->cliente, $venda->id, $venda->valor])}} class='btn btn-primary'>Quitar</a></td>
                                <?php } ?>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        <?php } ?>
    
    </home-component> 

   

@endsection
