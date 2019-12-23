<template>

    <div class="card">
        <div class="card-header">
            <h5>Informacion Funcionario</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item" v-for="(item, index) in datos" :key="index">
                    {{ item.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                datos : [],
            }
        },
        created(){
            axios.get('home').then(response =>{
                this.datos = response.data;
            })
        }
    }
</script>