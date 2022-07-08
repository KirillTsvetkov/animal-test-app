<template>
    <div @click="$emit('createAnimal', kind.name)">
       <img v-bind:src="'/images/'+kind.name+'.png'" width="40px"/> 
    </div>

</template>

<script>
export default {
  props: ['kind'],
  data() {
    return {
        
    };
  },
  methods: {
    createAnimal(){
        axios
        .post("./api/animals", {
          kindId: this.kind.id,
         
        })
        .then(function (response) {
           console.log(response.data);
        })
        .catch(function (error) {
          currentObj.output = error;
        });
    }
  },
 
}
</script>
