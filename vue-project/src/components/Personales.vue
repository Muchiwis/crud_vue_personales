
<template>
    <div class="contet">
        <div>
            <button class="btn btn-primary nuevo">Nuevo registro</button>
        </div>
        <table class="table table-dark">
            <thead>
                <!-- <tr v-for="(item, index) in mostrarDatos()" :key="index"> -->
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Texto</th>
                    <th>Celular</th>
                    <th>OPCION</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in todoDato" :key="index">
                    <td>{{ item.id }}</td>
                    <td>{{ item.nombre }}</td>
                    <td>{{ item.apellido }}</td>
                    <td>{{ item.texto }}</td>
                    <td>{{ item.celular }}</td>
                    <td>
                        <button class="btn btn-success edit">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</template>
<script setup>
    import { obtenerLista,obtenerPersonal,EliminarPersonal, todoDato, crearPersonal, actualizarPersonal } from "../composables/personajes";
    import { ref, onMounted } from "vue";

    const mostrarDatos = async () =>{
        try {
            const respuesta = await obtenerLista();
            return respuesta;
        } catch (error) {
            console.log("Error al consultar datos: "+error);
        }
    }
    onMounted(() => {
        obtenerLista();
    });
    
    todoDato.value = obtenerLista();

    const mostrarPersonal = async (id) => {
        let imprimir = await obtenerPersonal(id);
        console.log(imprimir);
    }
    const EliminarPersonalFront = async (id) => {
        let eliminado = await EliminarPersonal(id);
        console.log(eliminado);
    }

    const datosAgregar = {
        nombre: "Prueba Store 2 lorena",
        apellido: "Prueba apellido 2 mishell and lorena",
        texto: "Prueba texto 2",
        celular: 9456789,
    };

    const insertarDatos = async (datosAgregar) => {
        const respuesta = await crearPersonal(datosAgregar);
        console.log(respuesta);
    }

    const actualizarDatos = async (datosAgregar,id) => {
        const respuesta = await actualizarPersonal(datosAgregar,id);
        console.log(respuesta);
    }

    // insertarDatos(datosAgregar);
    //mostrarDatos();  
    //actualizarDatos(datosAgregar,4);
    //mostrarPersonal(4)


</script>


<style scope>
    h1{
        color: #000;
    }
    .nuevo{
        margin-bottom: 5px;
    }
    .edit{
        margin-right: 8px;
    }
</style>