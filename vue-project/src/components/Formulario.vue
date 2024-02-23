<template>
    <form @submit.prevent="submitForm">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" v-model="datosAgregar.nombre">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" v-model="datosAgregar.apellido">
        </div>
        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <input type="text" class="form-control" id="texto" v-model="datosAgregar.texto">
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="number" class="form-control" id="celular" v-model="datosAgregar.celular">
        </div>
        <button type="submit" class="btn btn-primary">{{ isEditing ? 'Actualizar' : 'Guardar' }}</button>
        <button type="button" class="btn btn-danger" @click="cancelar">Cancelar</button>
    </form>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { obtenerPersonal, crearPersonal, actualizarPersonal } from "@/composables/personajes";
import { useRouter } from 'vue-router';

const datosAgregar = ref({
    nombre: "",
    apellido: "",
    texto: "",
    celular: '',
});

const router = useRouter();
const userIdToEdit = parseInt(router.currentRoute.value.params.id);

// Declara isEditing
let isEditing = userIdToEdit !== 0;
onMounted(async () => {
    if (userIdToEdit !== 0) {
        // Si el ID no es 0, estamos editando un usuario existente
        const personal = await obtenerPersonal(userIdToEdit);
        datosAgregar.value = { ...personal };
    }
});

const submitForm = async () => {
    try {
        if (userIdToEdit !== 0) {
            // Si el ID no es 0, actualizamos el usuario existente
            await actualizarPersonal(datosAgregar.value, userIdToEdit);
        } else {
            // Si el ID es 0, creamos un nuevo usuario
            await insertarDatos(datosAgregar.value);
        }
        router.push('/');
    } catch (error) {
        console.log("Error al registrar:", error);
    }
}

const insertarDatos = async (datosAgregar) => {
    const respuesta = await crearPersonal(datosAgregar);
    console.log(respuesta);
}

const actualizarDatos = async (datosAgregar, id) => {
    const respuesta = await actualizarPersonal(datosAgregar, id);
    console.log(respuesta);
}

const cancelar = () => {
    router.push('/');
};


</script>




<style scoped>
label{
    color: #000;
}

</style>