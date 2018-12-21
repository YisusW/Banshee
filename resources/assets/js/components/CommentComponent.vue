<template>
  <div class="">
    <label for="">Comentarios</label>
    <select class="form-control" name="" v-model="comment" >
      <option value="">Seleccione</option>
      <option v-for="value in comments"
        :value="value.id">{{ value.description }} </option>
    </select>
  </div>
</template>

<script>
    export default {
      data :function (){
        return {
          /* array to show list */
          comments : [],
          message_validate_form : "",
          comment : ""
        }
      },
      mounted() {
          console.log('Component mounted.')
          this.getComments()
      },
      methods :{

        getComments: function(){
          axios.get('/getCommentsList').then((response) => {
              if (response.data.result == 1) {
                  let states = this.comments
                  response.data.data.forEach(function( value ){
                    states.push(value)
                  })
              } else {
                  this.message_validate_form = "La lista de paises no se cargó correctamente";
              }
          });
        }
      }
    }
</script>
