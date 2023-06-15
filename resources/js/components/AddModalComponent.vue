<template>
    <div class="container">
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
                        <form method='POST' :action='rota' class='form-control'>

                            <input type="hidden" name="_token" :value="token_csrf">

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
    </div>
</template>

<script>
    export default {
        props: ['token_csrf', 'rota']
    }
</script>
