<template>
    <div class="container">
        <div class="row">
            <div class="animal-item col" v-for="(animal, index) in animalList" :key="animal.id+animal.lenght" >
                    <animalcomponent :animal="animal" @reloadAnimals="reloadAnimals"></animalcomponent>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
 
  data() {
    return {
        animalList:[],
    };
  },
  methods: {
    reloadAnimals(){
      let object = this;
      
      axios.get("./api/animals").then((response) => (
        object.animalList = response.data.data
        //console.log(response.data)
        
        ));
      
    }
   
  },
  created() {
    this.reloadAnimals();
    this.timer = setInterval(this.reloadAnimals, 60000);  
  }
}
</script>
