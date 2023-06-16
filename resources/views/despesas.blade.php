@extends('layouts.app')

@section('content')

    <home-component titulo='Despesas'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddDespesa" class='btn btn-success'>Adicionar Despesa</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#consulta" class='btn btn-warning m-2'>Consultar Despesa</button>
        
        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component btn='Registrar' id='AddDespesa' titulo='Adicione uma despesa' rota='{{route('despesa.store')}}' token_csrf='{{csrf_token()}}'>
        
            <input-component name='nome' type='name' label='Informe o nome da despesa'></input-component>
            <input-component name='valor' type='number' label='Informe o valor da despesa'></input-component>
            <label class='mt-1'>Informe a condição de pagamento</label>
            <select id='select_pag' class='mt-1 form-control'>
                <option>A vista</option>
                <option>A prazo</option>
            </select>

        </add-component>

        <add-component btn='Consultar' id='consulta' titulo='Escolha o mês desejado para gerar o relatorio' rota='{{route('home')}}' token_csrf='{{csrf_token()}}'>

            <select-component label='Selecione um mês' name='mes'></select-component>
    
        </add-component>
    
    </home-component>

@endsection
