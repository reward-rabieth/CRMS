<template>
    <div>
        <button class="btn btn-danger px-3 d-flex justify-content-around align-items-center"
                @click="remove">
            Delete
            <ion-icon class="mx-2" size="small" name="trash-sharp"></ion-icon>
        </button>
    </div>
</template>

<script>
export default {
name: "DeleteButton",
    props:['route','id'],
    methods:{
        remove:function (){
            axios.delete(`${this.route}`)
                .then(() => {
                    location.reload();
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>

</style>
