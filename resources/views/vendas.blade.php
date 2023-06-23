@extends('layouts.app')

@section('content')

    <home-component titulo='Vendas'>
    
        <button type="button" data-bs-toggle="modal" data-bs-target="#AddVenda" class='btn btn-success'>Adicionar Venda</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#ConsultaVenda" class='btn btn-warning m-2'>Consultar Vendas</button>
        
        <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['msg'] ?>
            </div>
        <?php } ?>

        <?php if(isset($vendas)) { ?>

            <table class="table mt-2">
                    <thead>
                        <tr>
                            <td scope="col">NOME</th>
                            <td scope="col">VALOR</th>
                            <td scope="col">PAGAMENTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendas as $key => $venda)
                            <tr id='despesa_{{$venda->id}}'>
                                <td >{{$venda->Produto->nome}}</th>
                                <td>{{$venda->valor}}</td>
                                <td>{{$venda->pagamento}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

        <?php } ?>

        <add-component metodo='POST' btn='Registrar' id='AddVenda' titulo='Adicione uma venda' rota='{{route('venda.store')}}' token_csrf='{{csrf_token()}}'>

            <input-component id='codpro' type='number' name='codpro' label='Informe o código'></input-component>
            <input-component id='qtd' type='number' name='qtd' label='Informe a quantidade'></input-component>
            <input-component id='desconto' type='number' step='any' name='desconto' label='Informe o desconto'></input-component>
            <input-component id='p_nome' disable='disable' type='text' name='' label='Produto'></input-component>
            <input-component id='p_valor' disable='disable' step='any' type='number' name='' label='Valor'></input-component>
            <label class='mt-1'>Informe a condição de pagamento</label>
            <select name='pagamento' id='select_pag' class='mt-1 form-control'>
                <option>A vista</option>
                <option>A prazo</option>
            </select>

            <input-component idlabel='label_id' id='input_nome' type='hidden' name='nome' label=''></input-component>
            <input-component id='p_valor2' step='any' type='hidden' name='valor' label=''></input-component>

            <input id='user_id'  type='hidden' value='{{auth()->user()->id}}' name='user_id'>
            

        </add-component>

        <add-component metodo='GET' btn='Consultar' id='ConsultaVenda' titulo='Selecione a data ou o mês desejado' rota='{{route('venda.create')}}' token_csrf='{{csrf_token()}}'>

            <input-component type='date' label='Selecione o dia' name='dia'></input-component>

            <select-component class='mt-2' label='Ou selecione um mês' name='mes'></select-component>
        
        </add-component>
    
    </home-component>



@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function(){

            $('#select_pag').on('change', function(){
                
                let valorSelect = document.getElementById('select_pag').value

                if(valorSelect == 'A prazo') {
                    $('#input_nome').attr('type', 'name');
                    $('#label_id').html('Informe o nome do cliente');
                } else {
                    $('#input_nome').attr('type', 'hidden');
                    $('#label_id').html('');
                }

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#codpro").keyup(function(){
                
               
                let input = document.querySelector("#codpro").value;
                let userId = document.querySelector("#user_id").value;
        
                let rota = '/produto-id/' + input + '/' + userId
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {
                        
                        $("#p_nome").attr("value", data['nome'] )
                        $("#p_valor").attr("value", data['preço'] )
                      
                    }

                });

            });

            $("#qtd").keyup(function(){

                let input = document.querySelector("#codpro").value;
                let userId = document.querySelector("#user_id").value;
        
                let rota = '/produto-id/' + input + '/' + userId       
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {

                        let valor = data['preço'] * document.querySelector("#qtd").value;

                        $("#p_valor").attr("value", valor )
                        $("#p_valor2").attr("value", valor )
                            
                    }

                });

            })

            $("#desconto").keyup(function(){

                let input = document.querySelector("#codpro").value;
                let userId = document.querySelector("#user_id").value;
        
                let rota = '/produto-id/' + input + '/' + userId
                
                $.ajax({
                    url: rota,
                    type: 'POST',
                    contentType: 'application/json',
                    
                    success: function(data) {

                        let valor = data['preço'] * document.querySelector("#qtd").value;
                        let desconto = document.querySelector("#desconto").value;

                        let valorFinal = valor - desconto

                        $("#p_valor").attr("value", valorFinal )
                        $("#p_valor2").attr("value", valorFinal )
                            
                    }

                });
                
            })

        })

    </script>
    
