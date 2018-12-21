<template>
  <div class="">
    <label for="">Ciudad</label>
    <select class="form-control" name="" >
      <option value="">Seleccione</option>
      <option v-for="value in city"
        :value="value.id">{{ value.description }} </option>
    </select>
  </div>
</template>

<script>
    export default {
      props : ['getCitiesData'],
      data :function (){
        return {
          /* array to show list */
          city : [],
          message_validate_form : ""
        }
      },
      mounted() {
          console.log('Component mounted.')
      },
      methods :{
        getCities :function( id_departament ){

          axios.get('/getCitiesList/'+id_departament+'/').then((response) => {
              if (response.data.result == 1) {
                  let states = this.city
                  response.data.data.forEach(function( value ){
                    states.push(value)
                  })
              } else {
                  this.message_validate_form = "La lista de departamentos no se cargó correctamente";
              }
          });
          this.getCitiesData.active = false
        }
      },
      computed : {
          listen : function(){

            if ( this.getCitiesData.active ) {
              this.getCities( this.getCitiesData.id )
            }

          }
      }
    }
</script>
