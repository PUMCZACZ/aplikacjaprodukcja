<template>
    <div class="mx-5">
        Testowy komponent
        <p>
            {{ name }}
        </p>
        <input class="p-3 m-3 border-red-200 border" type="text" v-model="name">

        <div v-for="item in lista">
            <p>{{ item }}</p>
        </div>

        <button @click="addElement">Dodaj element</button>

        <hr/>

        <button @click="fetchFromBackend">Pobierz z backu</button>

        <div>
            <strong>Z backendu przyszło:</strong>
            <p>
                {{ response }}
            </p>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "App",

    data() {
        return {
            name: '',
            lista: [
                'abc',
                'cde',
            ],

            response: null,
        }
    },

    methods: {
        addElement() {
            this.lista.push(Math.random());
        },

        fetchFromBackend() {
            axios.get('/api/group/add')
                .then((response) => {
                    this.response = response.data;
                });
            //
            // axios.post('/api/group/add', {
            //     'name': this.name
            // });

        }
    }
}
</script>

<style lang="scss" scoped>

</style>
