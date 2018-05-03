
@extends('master_admin')
@section('css_admin')
    <style>
        body{
            background-image: url('images/light-red-NR.jpg');
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
@stop
@section('title','faculty_e')

@section('body_admin')
    <div class="container">
        <br><br><br>


        @if($alert = Session::get('alert'))
            <script type="text/javascript">alert("{{$alert}}");</script>
        @endif


        <table class="centered responsive-table highlight">
            <tr>
                <td><b>NAME </b></td>
                <td><b>EMAIL ID</b></td>
                <td><b>BRANCH</b></td>
            </tr>
            <?php
            $user = \DB::table('faculty')->where('email_id',$edited_student[0])->get();
            ?>

            <tr>
                <td><?php   echo $user[0]->name ?> </td>
                <td> <?php   echo $user[0]->email_id ?></td>
                <td><?php   echo $user[0]->dept_name ?></td>
            </tr>
        </table>

        <br><br>
        <h6><i>Enter new course:   </i></h6>
        <form action="/edited_faculty1" method="post" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="email_id" value={{$edited_student[0]}}>
            <div class = "row">
                <div class="input-field col l4">
                    <label></label>
                    <select name="course_selected[]" multiple>
                        <option value = "" disabled selected>Select Course</option>
                        <option value = "cs621">cs621</option>
                        <option value = "cs608">cs608</option>
                        <option value = "cs615">cs615</option>
                        <option value = "cs304">cs304</option>
                        <option value = "cs306">cs306</option>
                    </select>
                </div>

            </div>
            <button style="margin-left: 9%" class="btn" name="submit" type="submit">Update</button>
        </form>



        @stop


        @section('script_admin')

            <script>


                $(document).ready(function(){
                    $('.sidenav').sidenav();
                    $('select').formSelect();
                });
            </script>

@stop

