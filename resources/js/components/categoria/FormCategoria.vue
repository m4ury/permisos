<template>
    <form action="#" v-on:submit.prevent = "nuevaCategoria()">
        <div class="form-group">
            <input v-if="modoEdicion"
                   type="text"
                   name="categoria"
                   v-model="categoria.nombre_categoria"
                   class="form-control" placeholder="Nombre de la Categoria"
                   required autofocus>
            <p v-else>{{ categoria.nombre_categoria }}</p>
        </div>
        <div class="form-group">
            <input type="text"
                   name="descripcion_categoria"
                   v-model="descripcion_categoria"
                   class="form-control"
                   placeholder="Descripción de la Categoria">
        </div>
        <button v-if="modoEdicion" type="submit" class="btn btn-success btn-block" v-on:click="editarCategoria()">Guardar cambios</button>
        <button v-else type="submit" class="btn btn-default btn-block" v-on:click="editarCategoria()">Editar</button>
        <a href="#" class="btn btn-secondary btn-block">Volver</a>
    </form>
</template>

<script>
    export default {
        data() {
          return {
              modoEdicion : false,
              nombre_categoria: '',
              descripcion_categoria: ''
          }
        },
        name: "Form",
        methods : {
            nuevaCategoria(){

            }
        }
    }
</script>

<style scoped>

</style>