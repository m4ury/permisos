<template>
    <div class="card">
                <div class="card-header">
                    <h5>Informacion Funcionario</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            Nombre:
                        </div>
                        <div class="col-6">
                            Rut: 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Calidad Contr.: 
                        </div>
                        <div class="col-6">
                            Cargo: 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Unidad: 
                        </div>
                        <div class="col">
                            Grado: 
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
