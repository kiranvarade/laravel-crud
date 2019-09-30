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
     <form method="post" action="/employees">
          <div class="form-group">
               {{ csrf_field() }}
               <label for="name">Name</label>
               <input type="text" name="name" class="form-control" placeholder="name">
          </div>
          <div class="form-group">
               <label for="exampleFormControlInput1">Email address</label>
               <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">   
          </div>
          <div class="form-group">
               <label for="name">Password</label>
               <input  type="password" class="form-control" name="password" placeholder="password">
          </div>
          <div>
               <button class="btn btn-primary">Save</button>   
               <a href="{{ url('employees') }}" class="btn btn-primary btn " role="button" aria-pressed="true">Back</a>
          </div>
     </form>	
</div>
@endsection
