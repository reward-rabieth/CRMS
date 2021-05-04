<template>
    <div>
        <button class="btn btn-outline-primary px-3 d-flex justify-content-around align-items-center"
                @click="update">
            Update
        </button>
    </div>
</template>

<script>
export default {
    name: "UpdateButton",
    props:['route','id'],
    methods:{
        update:function (){
            axios.put(`${this.route}`)
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
