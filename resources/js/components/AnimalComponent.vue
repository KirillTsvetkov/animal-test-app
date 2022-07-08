<template>
    <div class="container">
        
        <img v-bind:src="'/images/'+animal.kind+'.png'" @load="setWidth" :style="{ width: imageWidth }"/> 
        <div class="text-center mt-3 mb-3">{{animal.name}} <button type="button" class="btn btn-info" @click="makeOld($event)">Состарить</button></div>
        

    </div>
</template>

<script>
export default {
  props: ['animal'],
  data() {
    return {
        imageWidth: null
    };
  },
  methods: {
    setWidth(){
        let value = 15 + this.animal.size * 8;
        this.imageWidth = value+'px';
    },
    makeOld(){
        let currentObj = this;
        axios
        .post("./api/animals/age", {
          name: this.animal.name,
         
        })
        .then(function (response) {
           console.log(response.data);
           currentObj.$emit('reloadAnimals');
        })
        .catch(function (error) {
          currentObj.output = error;
        });
    }
  },
  created() {
    console.log(this.$props);
  }
}
</script>
