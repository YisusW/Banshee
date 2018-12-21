<template>
  <div class="">
    <label for="">Departamentos</label>
    <select class="form-control" name="" v-model="departament" v-on:change="sendgetCity" >
      <option value="">Seleccione</option>
      <option v-for="value in departaments"
        :value="value.id">{{ value.description }} </option>
    </select>
  </div>
</template>

<script>
    export default {
      props : ["getDepartamentsData"],
      data :function (){
        return {
          /* array to show list */
          departaments : [],
          message_validate_form : "",
          departament : ""
        }
      },
      mounted() {
          console.log('Component Departament mounted.')
      },
      methods:{
        getDepartaments :function( id_country ){

          axios.get('/getDepartamentsList/'+id_country).then((response) => {
              if (response.data.result == 1) {
                  let states = this.departaments
                  response.data.data.forEach(function( value ){
                    states.push(value)
                  })
              } else {
                  this.message_validate_form = "La lista de departamentos no se cargó correctamente";
              }
          });
          this.getDepartamentsData.active = false
        },
        /** */
        sendgetCity : function()
        {
            this.$emit( 'getCities:active' ,this.departament )
        }
      },
      computed : {
        mapgetDepartamentsData: function () {
          if( this.getDepartamentsData.active )
              this.getDepartaments(this.getDepartamentsData.id)
        }
      }
    }
</script>
