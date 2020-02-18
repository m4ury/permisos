<template>
    <div class="col-md-7">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Fecha creación</th>
                <th>Nombre Categoria</th>
                <th>Descripción</th>
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
        name: "Categoria",
        created() {
            this.listarCategorias();
        },
        data() {
            return {
                categoria: {
                    nombre_categoria: '',
                    descripcion_categoria: '',
                    created_at: ''
                },
                categorias: [],
            }
        },

        methods: {
            listarCategorias() {
                axios.get('categorias').then(response => {
                    this.categorias = response.data.data;
                })
            }
        }
    }

</script>

<style scoped>

</style>