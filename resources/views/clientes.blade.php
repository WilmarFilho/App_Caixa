@extends('layouts.app')

@section('content')

    <home-component titulo='Clientes'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddCliente" class='btn btn-success'>Adicionar Cliente</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsulCliente" class='btn btn-warning m-2'>Consultar Cliente Por Nome</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsulEstado" class='btn btn-success m-2'>Consultar Cliente Por Estado</button>
        <a href="{{route('consultaDevedores')}}" type="button" class='btn btn-warning m-2'>Consultar Clientes Devedores</a>
      

        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <add-component metodo='POST' token_csrf='{{csrf_token()}}' rota='{{route('cliente.store')}}' btn='Cadastrar' titulo='Cadastrar novo cliente' id='AddCliente'>
        
            <input-component type='name' label='Informe o nome do cliente' name='nome'></input-component>
            <input-component type='name' label='Informe o nome comercial do cliente' name='nome_comercial'></input-component>
            <input-component type='name' label='Informe o endereço do cliente' name='endereco'></input-component>
            <input-component type='name' label='Informe a cidade do cliente' name='cidade'></input-component>

            <label class='mt-2'>Escolha o Estado do cliente:</label>

            <select name='estado' class="form-control mt-2">
            
                <option>GO</option>
                <option>MT</option>
                <option>BA</option>
            
            </select>

            <input-component step='any' type='number' label='Informe o número do cliente' name='numero'></input-component>

            <input-component step='any' type='number' label='Informe o saldo devedor do cliente' name='saldo'></input-component>

        </add-component>

        <add-component metodo='POST' classe='display: none' rota='{{route('produto.create')}}' btn='Consultar' titulo='Consultar Cliente' id='ConsulCliente'>
        
            <input-component id='nome' type='name' label='Informe o nome do cliente para consulta' name='nome'></input-component>

            <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">NOME</th>
                        <td scope="col">COMERCIAL</th>
                        <td scope="col">CIDADE</th>
                        <td scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='vertical-align: middle !important;'>
                        <td id='p_nome'></th>
                        <td id='p_comercial'></td>
                        <td id='p_cidade'></td>
                        <td id='p_saiba'>

                            <form method='GET' action='{{route('showCustom')}}' > 
                            
                                <input id='id-cliente' type='hidden' value='' name='id-cliente'>
                                <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>
                                <button type='submit' class='btn btn-primary mt-2'>Ver mais</button>
                            
                            </form>
                        
                            
                        
                        </td>
                        
                    </tr>
                </tbody>
            </table>

        </add-component>

        <add-component metodo='POST' token_csrf='{{csrf_token()}}' rota='{{route('consultaEstado')}}' btn='Consultar' titulo='Consultar Cliente' id='ConsulEstado'>

            <label class='mt-2'>Selecione o Estado do Cliente:</label>

            <select name='estado' class="form-control mt-2">
            
                <option>GO</option>
                <option>MT</option>
                <option>BA</option>
            
            </select>

            <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>

        </add-component>

         

        <?php if(isset($clientes)) { ?>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <td scope="col">Nome</th>
                        <td scope="col">Comercio</th>
                        <td scope="col">Estado</th>
                        <td scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($clientes as $indice => $cliente)
                        
                        <tr style='vertical-align: middle !important;'>
                            <td >{{$cliente->nome}}</th>
                            <td >{{$cliente->nome_comercial}}</td>
                            <td >{{$cliente->estado}}</td>
                            <td >

                                <a href={{route('cliente.show', $cliente->id)}} class=" btn btn-primary">Ver Mais</a>
            
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
        
                let rota = '/cliente/' + input + '/' + userId
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {
                        
                        $("#p_nome").html(data['nome'])
                        $("#p_comercial").html(data['nome_comercial'])
                        $("#p_cidade").html(data['cidade'])
                        $("#id-cliente").attr("value", data['id'] )
                      
                    }

                });

            });

        })

    </script>
