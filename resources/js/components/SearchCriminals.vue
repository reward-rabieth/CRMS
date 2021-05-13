<template>
<div>
    <h1 class="text-center">
        Enter Criminal name
    </h1>
    <div class="mb-3 container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="input-group">
                    <input v-model="name" id="search-input" placeholder="Search" name="name" type="search" class="form-control" />
                    <div class="input-group-append">
                        <button @click="search" id="search-button" type="submit" class="btn btn-primary">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="suspects" class="container">
        <div v-for="suspect in suspects" class="card my-2">
            <div class="card-body py-1">
                <strong>Name: </strong>  {{ suspect.suspectName }} |
                <strong>Status: </strong> {{ suspect.status }} |
                <strong>Section Law: </strong> {{ suspect.sectionLaw }}
            </div>
        </div>
    </div>
    <div v-if="isEmpty" class="container text-center">
       <p> No Criminal Record found!</p>
    </div>
</div>
</template>

<script>
export default {
    name: "SearchCriminals",
    data(){
        return{
            name:"",
            suspects:[],
            isEmpty: true
        }
    },
    methods:{
        search:function (){
            if (!this.name.isEmpty){
                axios.post("http://127.0.0.1:8000/criminal-analysis",{
                    "name":this.name
                }).then(reponse => {
                    let data = reponse.data;
                    if (data.length){
                        this.isEmpty = false
                        this.suspects = []
                        data.forEach(item => {
                            this.suspects.push(item)
                        })
                    }else {
                        this.suspects = []
                        this.isEmpty = true
                    }
                })
            }
        }
    }
}
</script>

<style scoped>
.card{
    cursor: pointer;
    border-left: 5px solid crimson;
}
</style>
