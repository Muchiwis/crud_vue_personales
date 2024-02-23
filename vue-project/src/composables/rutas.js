import { createRouter, createWebHistory } from "vue-router";
import FormularioVue from "@/components/Formulario.vue";
import PersonalesVue from "@/components/Personales.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: PersonalesVue,
        },
        { 
            path: '/form/:id?', 
            name: 'Formulario', 
            component:  FormularioVue,
        }
    ]
});
export default router;