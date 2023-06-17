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

        <add-component btn='Registrar' id='AddVenda' titulo='Adicione uma venda' rota='{{route('venda.store')}}' token_csrf='{{csrf_token()}}'>

            <input-component type='number' name='codpro' label='Informe o código'></input-component>
            <input-component type='number' name='qtd' label='Informe a quantidade'></input-component>
            <label class='mt-1'>Informe a condição de pagamento</label>
            <select id='select_pag' class='mt-1 form-control'>
                <option>A vista</option>
                <option>A prazo</option>
            </select>
            <input-component idlabel='label_id' id='input_nome' type='hidden' name='nome' label=''></input-component>
            

        </add-component>

        <add-component btn='Consultar' id='ConsultaVenda' titulo='Selecione o mês desejado' rota='{{route('venda.create')}}' token_csrf='{{csrf_token()}}'>

            <select-component label='Selecione um mês' name='mes'></select-component>
        
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

        })

    </script>
    
