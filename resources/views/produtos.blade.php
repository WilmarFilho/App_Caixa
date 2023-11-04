@extends('layouts.app')

@section('content')

    <home-component titulo='Produtos'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddProduto" class='btn btn-success'>Adicionar Produto</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsulProduto" class='btn btn-warning m-2'>Consultar Produto Por Nome</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsulTipo" class='btn btn-success m-2'>Consultar Produto Por Tipo</button>

        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component metodo='POST' token_csrf='{{csrf_token()}}' rota='{{route('produto.store')}}' btn='Cadastrar' titulo='Cadastrar novo produto' id='AddProduto'>
        
            <input-component type='name' label='Informe o nome do produto' name='nome'></input-component>
            <input-component step='any' type='number' label='Informe o preço do produto' name='preco'></input-component>
            <input-component step='any' type='number' label='Informe o preço de custo do produto' name='precoc'></input-component>
            <label class='mt-2'>Escolha o tipo do produto:</label>
            <select name='tipo' class="form-control mt-2">
            
                <option>Salgado</option>
                <option>Bolo</option>
                <option>Pão/Massa</option>
                <option>Bebida</option>
            
            </select>

        </add-component>

        <add-component metodo='POST' classe='display: none' rota='{{route('produto.create')}}' btn='Consultar' titulo='Consultar produto' id='ConsulProduto'>
        
            <input-component id='nome' type='name' label='Informe o nome do produto para consulta' name='nome'></input-component>

            <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">CODPRO</th>
                        <td scope="col">NOME</th>
                        <td scope="col">PREÇO</th>
                        <td scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id='p_id'></th>
                        <td id='p_nome'></td>
                        <td id='p_preco'></td>
                        <td id='p_saibamais'>
                        

                            <form method='GET' action='{{route('showProdutoCustom')}}' > 
                            
                                <input id='id-produto' type='hidden' value='' name='id-produto'>
                                <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>
                                <button type='submit' class='btn btn-primary mt-2'>Ver mais</button>
                            
                            </form>
                        
                        
                        </td>
                    </tr>
                </tbody>
            </table>

        </add-component>

        <add-component metodo='POST' token_csrf='{{csrf_token()}}' rota='{{route('consultatipo')}}' btn='Consultar' titulo='Consultar produto' id='ConsulTipo'>

            <label class='mt-2'>Selecione o tipo do produto:</label>

            <select name='tipo' class="form-control mt-2">
            
                <option>Doce</option>
                <option>Bolo</option>
                <option>Pão/Massa</option>
                <option>Bebida</option>
            
            </select>

            <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>

        </add-component>

         

        <?php if(isset($produtos)) { ?>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">Nome</th>
                        <td scope="col">Preço</th>
                        <td scope="col">Tipo</th>
                        <td scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($produtos as $indice => $produto)
                        
                        <tr>
                            <td id='faturamento'>{{$produto->nome}}</th>
                            <td id='gastos'>{{$produto->preço}}</td>
                            <td id='lucro'>{{$produto->tipo}}</td>
                            <td >

                                <a href={{route('produto.show', $produto->id)}} class=" btn btn-primary">Ver Mais</a>
            
                            </td>
                        </tr>

                    @endforeach
                
                </tbody>
            </table>

        <?php } ?>
    
    </home-component>

@endsection


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#nome").keyup(function(){
                
               
                let input = document.querySelector("#nome").value;
                let userId = document.querySelector("#user_id").value;
        
                let rota = '/produto/' + input + '/' + userId
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {
                        
                        $("#p_id").html(data['id'])
                        $("#p_nome").html(data['nome'])
                        $("#p_preco").html(data['preço'])
                        $("#id-produto").attr("value", data['id'] )
                      
                    }

                });

            });

        })

    </script>
