<template>
   <div class="">
     <label for="">País</label>
     <select class="form-control" name="" v-model="countries" v-on:change="sendgetDepartaments" >
       <option value="">Seleccione</option>
       <option v-for="value in country"
         :value="value.id">{{ value.description }} </option>
     </select>
   </div>
</template>

<script>
    export default {
      data :function (){
        return {
          /* array to show list */
          country : [],
          message_validate_form : "",
          countries : ""
        }
      },
        mounted() {
            console.log('Component mounted.')
            this.getCountry();
        },
        methods:{
          getCountry :function(){
            axios.get('/getCountriesList').then((response) => {
                if (response.data.result == 1) {
                    let states = this.country
                    response.data.data.forEach(function( value ){
                      states.push(value)
                    })
                } else {
                    this.message_validate_form = "La lista de paises no se cargó correctamente";
                }
            });
          },
          /**  */
          sendgetDepartaments : function (){

            this.$emit('getDepartaments:active',this.countries)
          }
        }
    }
</script>
