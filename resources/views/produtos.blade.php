@extends('layouts.app')

@section('content')

    <home-component titulo='Produtos'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddProduto" class='btn btn-success'>Adicionar Produto</button>
        
        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component btn='Cadastrar' titulo='Cadastrar novo produto' id='AddProduto'>
        
            <input-component type='name' label='Informe o nome do produto' name='nome'></input-component>
            <input-component type='number' label='Informe o preço do produto' name='preco'></input-component>
            <input-component type='number' label='Informe o preço de custo do produto' name='precoc'></input-component>

        </add-component>
    
    </home-component>

@endsection
