@extends('layouts.app')

@section('content')

    <home-component titulo='Detalhes do Cliente'>

        <form class='form-control'>
            <div class='justify-content-between d-flex'>
                <label>Codígo:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$produto->id}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Nome:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$produto->nome}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Preço:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$produto->preço}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Preço de custo:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$produto->preço_c}}'>
            </div>
            <div class='justify-content-between d-flex mt-2'>
                <label>Tipo:</label>
                <input class='from-control' disabled='disable' type='text' value='{{$produto->tipo}}'>
            </div>
        </form>

        <button type="button" data-bs-toggle="modal" data-bs-target="#EditaDados" class='btn btn-success mt-5'>Editar Produto</button>

        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-2 mb-5" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component metodo='GET' token_csrf='{{csrf_token()}}' rota={{route('produto.edit', $produto->id)}} btn='Editar' titulo='Cadastrar novo produto' id='EditaDados'>
        
            <input-component valor='{{$produto->nome}}' type='name' label='Informe o nome do produto' name='nome'></input-component>
            <input-component valor='{{$produto->preço}}' step='any' type='number' label='Informe o preço do produto' name='preco'></input-component>
            <input-component valor='{{$produto->preço_c}}' step='any' type='number' label='Informe o preço de custo do produto' name='precoc'></input-component>
            <label class='mt-2'>Escolha o tipo do produto:</label>
            <select valor='{{$produto->tipo}}' name='tipo' class="form-control mt-2">
            
                <option>Salgado</option>
                <option>Bolo</option>
                <option>Pão/Massa</option>
                <option>Bebida</option>
            
            </select>

            <input-component valor='{{$produto->id}}' step='any' type='hidden'  name='produto-id'></input-component>

        </add-component>
    
    </home-component> 

   

@endsection
