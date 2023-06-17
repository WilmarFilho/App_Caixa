<template>
    <div>

        <label class='mt-1' :id='idlabel'>{{ label }}</label>
        <input :step='step' :id='id' class='form-control' :type=type :placeholder=placeholder :name=name>

    </div>
</template>

<script>
    export default {
        props: [
            'step', 'idlabel', 'id', 'label', 'placeholder', 'classlabel', 'name', 'type'
        ]
    }
</script>
