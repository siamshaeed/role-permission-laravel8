
@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Users Management </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


<table class="table table-bordered table-striped">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $user)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      {{-- @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif --}}
      <span class="badge badge-success">{{ $user->roles->pluck('name')->first() }}</span>
    </td>
    <td>
                    
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">


          <div class="btn-group mr-2" role="group" aria-label="First group">
              <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-success"> Edit </a>
          </div>
      
          <div class="btn-group mr-2" role="group" aria-label="Second group">
              <form action="{{ route('users.destroy' , $user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
                  
                  {{ csrf_field() }}
                  <input name="_method" type="hidden" value="DELETE">
                  <button type="submit" class="btn btn-danger">
                      Delete
                  </button>
      
              </form>
          </div>
          
      </div>   
  </td>

  </tr>
 @endforeach
</table>
@endsection 