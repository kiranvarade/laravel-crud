@extends('welcome')

@section('content')


<div class="container">
<div>
  <a href="{{ url('employees/create') }}" class="btn btn-primary btn " role="button" aria-pressed="true">Add Employee </a>
</div>
<hr>
			<table class="table ">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $emp)
						<tr>
							<td>{{ $emp->emp_id }}</td>
                            <td>{{ $emp->emp_name }}</td>
                            <td>{{ $emp->emp_email }}</td>
                            <td>{{ $emp->password }}</td>
                           <td> 
						   		<a  href="{{ url('/employees/' . $emp->emp_id . '/edit')}}"
								   		 class="btn btn-outline-primary " > 
									 <i class="fa fa-edit  " aria-hidden="true"></i>
								 </a>
								 </td>
                            <td>
                                <form action="/employees/{{$emp->emp_id}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}										
										
								    <button class="btn btn-outline-danger " onclick="return confirm('Are you sure to delete?')" > 
									 <i style="color:red" class="fa fa-trash  " aria-hidden="true"></i>
									 </button>
									
                                </form>
                            </td>
                        </tr>
					@endforeach					
				</tbody>
			</table>
	
	</div>
	
@endsection