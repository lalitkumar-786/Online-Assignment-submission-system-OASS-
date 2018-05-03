@extends('master_admin')

@section('title','faculty')
@section('css_admin')
<style>
body{
    background-image: url('/images/a.jpg');
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover;

.card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    margin-left: 23%;
    margin-bottom: 3%;
    margin-top: 3%;
    transition: 0.3s;
    height:600px;
    width: 550px;
    position: relative;
    float: left;
    background-color: white;
}

}

</style>



@stop
@section('body_admin')
    @if($alert = Session::get('alert'))
        <script type="text/javascript">alert("{{$alert}}");</script>
    @endif

<div class="container">
        

    <div class="card">
      <h3 align="center">Fill the Details:</h3>
            <div class="row">
            <form class="col s12" action="/add_f" method="post" >
             <input type='hidden' name="_token" value="{{csrf_token()}}">
                  <div class="row">
                    <div class="input-field col s12">
                      <input  name="name" type="text" class="validate">
                      <label for="name">Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input  name="branch" type="text" class="validate">
                      <label for="branch">Branch</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input name="email" type="email" class="validate">
                      <label for="email">Email</label>
                    </div>
                  </div>
              

                   <div class = "row">
                        <div class="input-field col s12">
                            <label></label>
                            <select name="course_selected[]" multiple >
                            <option value = "" disabled selected>Select Course</option>
                            <option value = "cs621">cs621</option>
                            <option value = "cs608">cs608</option>
                            <option value = "cs615">cs615</option>
                            <option value = "cs304">cs304</option>
                            <option value = "cs306">cs306</option>
                            </select>     
                        </div>
                            
                    </div>
                    <div class="col l5 m6" style="margin-left:45%;margin-bottom: 3%">
                      <button class="btn" name="submit" type="submit">Submit</button>
                    </div>
            </form>
            </div>

        </div>        
</div>

@stop

@section('script_admin')

    <script>


        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

@stop