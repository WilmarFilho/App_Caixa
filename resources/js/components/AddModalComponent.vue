<template>
    <div class="container">
        <div :id='id' class="modal fade" tabindex="-1" aria-labelledby="VendaModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{titulo}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <form method='POST' :action='rota' class='form-control'>

                            <input type="hidden" name="_token" :value="token_csrf">

                            <slot></slot>
                                    
                                       
                            <button type='submit' class="mt-3 btn btn-primary">{{btn}}</button>
                                    
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
        props: ['btn', 'id', 'token_csrf', 'rota', 'titulo']
    }
</script>
