
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
@section('title','student_view')

@section('body_admin')
	<div class="container">
		<br><br><br>


		@if($alert = Session::get('alert'))
			<script type="text/javascript">alert("{{$alert}}");</script>
		@endif

	<ul id="slide-out" class="sidenav">

		<form action="/filter_student" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<br>
			<a href="#" ><b>   Course:</b></a>
			<div style="font-size:35px;color: black;margin-left:13%;margin-right:13%;">
				<select required="true" name='selected_course'>
					<option value="no_course_selected" disabled selected >Choose your course</option>
					<option value="cs608"  >cs608</option>
					<option value="cs621"  >cs621</option>
					<option value="cs615"  >cs615</option>
					<option value="cs304"  >cs304</option>
					<option value="cs306"  >cs306</option>
				</select>
			</div>
			<div style="margin-left:30%;color:gray;">
				<button class="btn">Go</button>
			</div>
		</form>

		</li>

		</form>



	</ul>
	<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>



		<table class="centered responsive-table highlight">
			<tr>
				<td><b>Select to delete</b></td>
				<td><b>NAME </b></td>
				<td><b>ROLL NO</b></td>
				<td><b>EMAIL ID</b></td>
				<td><b>BRANCH</b></td>
				<td><b>COURSE</b></td>
			</tr>
			<form action="/delete_student" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			
			@foreach($students as $user)
				<tr>
					<td>
						  <label>
						  
					        <input type="checkbox"  name="deleted_items[]" value="{{$user->email_id}}" />
					        <span></span>
					      </label>
					</td>
					<td>{{$user->name}}</td>
					<td>{{$user->roll_no}}</td>
					<td>{{$user->email_id}}</td>
					<td>{{$user->dept_name}}</td>
					<td>
                   	<?php

	                   	 $course = \DB::table('enrolled_in')->where('email_id',$user->email_id)->pluck('course_id');
	                   	 $items=count($course);
	                   	 echo $course;
                   	?>
                    </td>

				</tr>
			@endforeach
				<tr>
				<td> </td>
				<td> </td>
				<td> </td>
				<td></td>
				<td></td>

				<td><button class="btn" name="delete" type="submit">Delete</button></td>
					<td><button class="btn" name="edit" type="submit">Edit</button></td>
		</tr>
			</form>
		</table>
@stop


@section('script_admin')

<script>


    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('select').formSelect();
    });
	</script>

@stop

