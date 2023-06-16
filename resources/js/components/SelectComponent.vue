<template>
    <div class='text-center'>
        
        <label>{{ label }}</label>
        <select :name="name" class="form-control mt-2">

                <option>Janeiro</option>
                <option>Fevereiro</option>
                <option>Março</option>
                <option>Abril</option>
                <option>Maio</option>
                <option>Junho</option>
                <option>Julho</option>
                <option>Agosto</option>
                <option>Setembro</option>
                <option>Outubro</option>
                <option>Novembro</option>
                <option>Dezembro</option>

        </select>

    </div>
</template>

<script>
    export default {
        props: [
            'label', 'name'
        ]
    }
</script>
