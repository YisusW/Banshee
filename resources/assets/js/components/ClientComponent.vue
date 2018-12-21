<template>
    <form>
      <fieldset class="form-group">

      </fieldset>
      <fieldset class="form-group">

      </fieldset>
      <fieldset class="form-group">
        <ListCountry @getDepartaments:active="getDepartamentsended" ></ListCountry>
      </fieldset>
      <fieldset class="form-group">
        <ListDepartament :getDepartamentsData="getDepartamentsData" @getCities:active="getCitysended" ></ListDepartament>
      </fieldset>
      <fieldset class="form-group">
        <ListCity :getCitiesData="getCitiesData" ></ListCity>
      </fieldset>
      <fieldset class="form-group">

        <ListComments></ListComments>

      </fieldset>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<script>
  import ListCountry from './CountryComponent'
  import ListDepartament from './DepartamentComponent'
  import ListCity from './CityComponent'
  import ListComments from './CommentComponent'

    export default {
      components:{
        ListCountry,
        ListDepartament,
        ListCity,
        ListComments
      },
      data :function (){
        return {
          /* array to show list */
          getDepartamentsData : {},
          getCitiesData : {},
          message_validate_form : ""
        }
      },
      methods : {
        getDepartamentsended : function (id) {
          this.getDepartamentsData = {'active' : true , 'id' : id}
          console.log('nojodas');
        },
        getCitysended : function (id) {
          this.getCitiesData = {'active' : true , 'id' : id}
        }
      }
    }
</script>
