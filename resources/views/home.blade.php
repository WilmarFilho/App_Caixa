@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Controle do caixa') }}</div>

                <div class="card-body display-flex text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class=''>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#VendaModal" class='btn btn-success'>Adicionar venda</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#DespesaModal" class='btn btn-danger'>Adicionar despesa</button>
                        <?php if(isset($_GET['msg'])) { ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?php echo $_GET['msg'] ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div id='VendaModal' class="modal fade" tabindex="-1" aria-labelledby="VendaModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicione uma Venda</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method='POST' action='/venda' class='form-control'>

                                        @csrf

                                        <label>Coloque o nome da venda:</label>
                                        <input name='nome' class='form-control' type='text'>
                                        <label>Coloque o valor da venda:</label>
                                        <input name='valor' class='form-control' type='number' step="any">

                                        <label>Coloque a forma de pagamento:</label>
                                        <select name='pagamento' class='form-control'>
                                            <option>A vista</option>
                                            <option>A prazo</option>                  
                                        </select>
                                    
                                       
                                        <button type='submit' class="mt-3 btn btn-primary">Registrar</button>
                                    
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id='DespesaModal' class="modal fade" tabindex="-1" aria-labelledby="DespesaModal" aria-hidden="true">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicione uma Despesa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method='POST' action='/despesa' class='form-control'>
                                    @csrf
                                    <label>Coloque o nome da despesa:</label>
                                    <input name='nome' class='form-control' type='text'>
                                    <label>Coloque o valor da despesa:</label>
                                    <input step='any' name='valor' class='form-control' type='number'>

                                    <label>Coloque a forma de pagamento:</label>
                                    <select name='pagamento' class='form-control'>
                                        <option>A vista</option>
                                        <option>A prazo</option>                  
                                    </select>
                                
                                    <button type='submit' class="mt-3 btn btn-primary">Registrar</button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
