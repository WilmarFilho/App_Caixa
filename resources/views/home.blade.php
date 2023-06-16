@extends('layouts.app')

@section('content')

    <home-component titulo='Controle do caixa'>
    
        <button type="button" class='btn btn-success'>Relatorio Atual</button>
        <!-- Btn para gerar a lista do mês atual -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#consulta" class='btn btn-warning m-2'>Consultar Relatorio</button>
        
        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>
    
    </home-component>

    <add-component btn='Consultar' id='consulta' titulo='Escolha o mês desejado para gerar o relatorio' rota='{{route('home')}}' token_csrf='{{csrf_token()}}'>

        <select-component label='Selecione um mês' name='mes'></select-component>
    
    </add-component>

@endsection
