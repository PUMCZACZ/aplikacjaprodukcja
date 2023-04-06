<template>
    <input
        v-model="jakaszmienna"
        class="border border-red-200 border-2"
        name="name" type="text">

    <Subcomponent :label="jakaszmienna" />

</template>

<script>
import Subcomponent from "./Subcomponent.vue";

export default {
    name: 'AddClient',
    components: {Subcomponent},

    data() {
        return {
            jakaszmienna: null,
            name: 'Anna',
            surname: 'Nowak'
        };
    },

    computed: {
        fullName() {
            return `${this.name} ${this.surname}`;
        }
    }
}

</script>
