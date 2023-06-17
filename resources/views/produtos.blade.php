@extends('layouts.app')

@section('content')

    <home-component titulo='Produtos'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddProduto" class='btn btn-success'>Adicionar Produto</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsulProduto" class='btn btn-warning m-2'>Consultar Produto</button>

        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component token_csrf='{{csrf_token()}}' rota='{{route('produto.store')}}' btn='Cadastrar' titulo='Cadastrar novo produto' id='AddProduto'>
        
            <input-component type='name' label='Informe o nome do produto' name='nome'></input-component>
            <input-component step='any' type='number' label='Informe o preço do produto' name='preco'></input-component>
            <input-component step='any' type='number' label='Informe o preço de custo do produto' name='precoc'></input-component>

        </add-component>

        <add-component classe='display: none' rota='{{route('produto.create')}}' btn='Consultar' titulo='Consultar produto' id='ConsulProduto'>
        
            <input-component id='nome' type='name' label='Informe o nome do produto para consulta' name='nome'></input-component>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">CODPRO</th>
                        <td scope="col">NOME</th>
                        <td scope="col">PREÇO</th>
                        <td scope="col">PREÇO_C</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id='p_id'></th>
                        <td id='p_nome'></td>
                        <td id='p_preco'></td>
                        <td id='p_precoc'></td>
                    </tr>
                </tbody>
            </table>

        </add-component>
    
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
        
                let rota = '/produto/' + input
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {
                        
                        $("#p_id").html(data['id'])
                        $("#p_nome").html(data['nome'])
                        $("#p_preco").html(data['preço'])
                        $("#p_precoc").html(data['preço_c'])
                      
                    }

                });

            });

        })

    </script>
