<template>
    <div>

        <label class='mt-1' :id='idlabel'>{{ label }}</label>
        <input :disabled="disable" :step='step' :id='id' class='form-control' :type=type :placeholder=placeholder :name=name :value=valor>

    </div>
</template>

<script>
    export default {
        props: [
            'valor','disable','step', 'idlabel', 'id', 'label', 'placeholder', 'classlabel', 'name', 'type',
        ]
    }
</script>
