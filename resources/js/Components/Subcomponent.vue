<template>
    <div class="klasa">
        To są dane z subkomponentu

        <p>Mój props: {{ label }}</p>

        <button @click="test">Zmień property</button>
    </div>
</template>

<script>
export default {
    name: "Subcomponent",

    props: {
        label: {
            type: String,
            require: true
        }
    },

    methods: {
        test(){
            this.label = 'aksladlkasjdksaljdklsajdkljdlksad';
        }
    }
}
</script>

<style lang="css" scoped>
    .klasa{
        background-color: #008800;
    }
</style>
