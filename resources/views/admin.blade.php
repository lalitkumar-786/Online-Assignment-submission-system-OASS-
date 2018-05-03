@extends('master_admin')

@section('title','admin')
@section('css_admin')
<style>
body{
    background-image: url('/images/a.jpg');
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
@stop
@section('body_admin')
    @if($alert = Session::get('alert'))
        <script type="text/javascript">alert("{{$alert}}");</script>
    @endif

<div class="container">
    
    <div class="row" id="cards">
        <div class="col s12 m7 l6 ">
            <div class="card small">
                <div class="card-image">
                    <img src="images/Books_Bokeh.jpg">
                    <span class="card-title black-text"><b>Add Student</b></span>
                </div>
                <div class="card-content">
                    <p>Add a student to a particular course</p>
                </div>
                <div class="card-action">
                    <a href="/add_student">Click Here</a>
                </div>
            </div>
        </div>
        <div class="col s12 m7 l6">
            <div class="card small">
                <div class="card-image">
                    <img src="images/office.jpg">
                    <span class="card-title black-text" > <b>Add Faculty</b></span>
                </div>
                <div class="card-content">
                    <p>Add a faculty to a course.</p>
                </div>
                <div class="card-action">
                    <a href="add_faculty">Click Here</a>
                </div>
            </div>
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