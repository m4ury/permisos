<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Categorias</h5>
                </div>
                
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            categorias: [],
            categoria: {
                id: '',
                nombre_categoria: '',
                descripcion_categoria: '',
            },
            categoria_id: '',
            edit: false
        }
    },
    created() {
        this.listarCategorias();
    },
    methods: {
        listarCategorias(){
            axios.get('categorias')
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    },
}
</script>