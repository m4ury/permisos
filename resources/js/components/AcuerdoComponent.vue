<template>
    <div class="col-md-7">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Titulo</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Expira</th>
                <th>Usuario asignado</th>
                <th class="text-center" colspan="2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="categoria in categorias" :key="categoria.id">
                <td v-text="categoria.created_at"></td>
                <td v-text="categoria.nombre_categoria"></td>
                <td v-text="categoria.descripcion_categoria"></td>
            </tr>
            </tbody>
        </table>
        <div>
            paginacion
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.listarAcuerdos();
        },
        data() {
            return {
                acuerdo: {
                    titulo_acuerdo: '',
                    descripcion_acuerdo: '',
                    created_at: '',
                    expiracion_acuerdo: ''
                },
                acuerdos: [],
            }
        },

        methods: {
            listarAcuerdos() {
                axios.get('acuerdos').then(response => {
                    this.acuerdos = response.data;
                })
            }
        }
    }

</script>

<style scoped>

</style>
