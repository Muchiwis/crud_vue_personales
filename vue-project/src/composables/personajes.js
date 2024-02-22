import axios from "axios";
import { ref } from "vue";

export const todoDato = ref([]);
export const obtenerLista = async () =>{
    const allPersonales = await axios.get('http://localhost:8000/api/personales');
    todoDato.value = allPersonales.data;
} 
export const obtenerPersonal = async (id) =>{
    const personal = await axios.get('http://localhost:8000/api/personales/'+id);
    return personal.data;
} 
export const EliminarPersonal = async (id) =>{
    const personalEliminado = await axios.delete('http://localhost:8000/api/personales/'+id);
    return personalEliminado.data;
} 
export const crearPersonal = async (contenido) =>{
    const allPersonales = await axios.post('http://localhost:8000/api/personales',contenido);
    return allPersonales.data;
} 

export const actualizarPersonal = async (updateContenido, id) =>{
    const updatePersonal = await axios.put('http://localhost:8000/api/personales/'+id,updateContenido);
    return updatePersonal.data;
} 