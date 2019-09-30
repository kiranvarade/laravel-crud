@extends('welcome')

@section('content')
<div class="container">
     @if ($errors->any())
          <div class="alert alert-danger">
               <ul>
                    @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                    @endforeach
               </ul>
          </div>
     @endif
     
     <form action="{{"/employees/" . $employee->emp_id}}" method="post" >
          {{ csrf_field() }}
	     {{ method_field('PATCH') }}
           <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name"  class="form-control" placeholder="name" value="{{$employee->emp_name}}">
          </div>
          <div class="form-group">
               <label for="exampleFormControlInput1">Email address</label>
               <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{$employee->emp_email}}" placeholder="name@example.com">   
          </div>
          <div class="form-group">
               <label for="name">Password</label>
               <input type="password"  class="form-control" name="password" placeholder="password">
          </div>
          <div>
               <button class="btn btn-primary">Update</button>   
               <a href="{{ url('employees') }}" class="btn btn-primary btn " role="button" aria-pressed="true">Back</a>
          </div>
     </form>	
</div>
@endsection
