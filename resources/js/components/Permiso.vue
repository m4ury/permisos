<template>
  <div class="container">
        <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Solicitado</th>
                        <th>Dia inicio</th>
                        <th>Dia fin</th>
                        <th>Descripcion</th>
                        <th>Lugar</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for ="permisos in arrayPermisos" v-bind:key="permisos.id">
                        <td>{{ dd(permisos)}}</td>
                    </tr>
                    </tbody>
                </table>
        </div>
  </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

</template>

<script>
    export default {
        data(){
            return{
                permisos: '',
                hora_inicio: '',
                hora_fin:'',
                descripcion: '',
                arrayPermisos :[]
            }
        },
        methods:{
            listarPermisos(){
                let me = this;
                axios.get('/permisos').then(function (response) {
                        me.arrayPermisos = response.data;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            }
        },
        mounted(){
            this.listarPermisos()
        }

    }
</script>

<style scoped>

</style>
