<template>
    <div>
       
        <div id="getKinds" class="row">
             <div class="col" @click="getKinds($event)">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            
            </div>
           
            <div class="list-of-kinds col" v-for="(kind, index) in kindList" :key="kind.name" >
                <kindcomponent :kind="kind" @createAnimal="createAnimal"></kindcomponent>
            </div>
            <div class="mt-2">
                <label for="doc-name">Имя животного:</label>
                <input type="text" id="animal-name" v-model="animalName" ref="animalName">
            </div>
            <div style="color:red">{{error}}</div>
        </div>
    </div>
   
</template>

<script>
export default {
    data() {
    return {
      kindList: [],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      animalName:'',
      error:'',
    };
  },
  methods: {
    
   getKinds() {
    axios.get("./api/animal_kinds").then((response) => (this.kindList = response.data.data));
    
   },
    createAnimal(kindName){
        let currentObj = this;
        axios
        .post("./api/animals", {
          kindName: kindName,
          name: this.animalName
        })
        .then(function (response) {
            
           if(response.data.error != null){
             console.log(response.data.data);
             currentObj.error = response.data.data;
           } else {
             currentObj.error = '';
             currentObj.$refs["animalName"].value = "";
           }
           

        })
        
        
    }
  }
}
</script>
