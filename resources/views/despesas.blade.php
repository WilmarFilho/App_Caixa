@extends('layouts.app')

@section('content')

    <home-component titulo='Despesas'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddDespesa" class='btn btn-success'>Adicionar Despesa</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#consulta" class='btn btn-warning m-2'>Consultar Despesa</button>
        
        <?php if(isset($msg)) { ?>
            <div class="alert alert-success mt-3" role="alert">
                {{$msg}}
            </div>
        <?php } ?>  
    
        <?php if(isset($despesas)) { ?>

            <table class="table mt-2">
                    <thead>
                        <tr>
                            <td scope="col">NOME</th>
                            <td scope="col">VALOR</th>
                            <td scope="col">PAGAMENTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($despesas as $key => $despesa)
                            <tr id='despesa_{{$despesa->id}}'>
                                <td >{{$despesa->nome}}</th>
                                <td>{{$despesa->valor}}</td>
                                <td>{{$despesa->pagamento}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        <?php } ?>

        <add-component metodo='POST' btn='Registrar' id='AddDespesa' titulo='Adicione uma despesa' rota='{{route('despesa.store')}}' token_csrf='{{csrf_token()}}'>
        
            <input-component name='nome' type='name' label='Informe o nome da despesa'></input-component>
            <input-component step='any' name='valor' type='number' label='Informe o valor da despesa'></input-component>
            <label class='mt-1'>Informe a condição de pagamento</label>
            <select name='pagamento' id='select_pag' class='mt-1 form-control'>
                <option>A vista</option>
                <option>A prazo</option>
            </select>

        </add-component>

        <add-component metodo='GET' btn='Consultar' id='consulta' titulo='Escolha o mês desejado para gerar o relatorio' rota='{{route('despesa.create')}}' token_csrf='{{csrf_token()}}'>

            <input-component type='date' label='Selecione o dia' name='dia'></input-component>

            <select-component class='mt-2'label='Ou selecione um mês' name='mes'></select-component>
    
        </add-component>
    
    </home-component>

@endsection
