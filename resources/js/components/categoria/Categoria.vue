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
            <tr>
                <td v-for="categoria in categorias"></td>
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
        data(){
            return{
                categorias : [],
            }
        },
        name: "Categoria",
        created() {
            axios.get('categorias').then(response => {
                this.categorias = response.data;
            })
        }
    }

</script>

<style scoped>

</style>