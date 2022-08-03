@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Permission</th>
   <th width="280px">Action</th>
 </tr>
@if(count($roles) > 0)

        @foreach ($roles as $role)

            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    <strong>
                        {{ $role->name }}
                    </strong>
                </td>
                <td>
                    @foreach ($role->permissions as $permission)
                        <li class="text-capitalize">
                            {{ str_replace('_', ' ', $permission->name) }}
                        </li>
                    @endforeach
                </td>
                <td>
                    
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              
              
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="{{ route('roles.edit' , $role->id) }}" class="btn btn-success"> Edit </a>
                        </div>
                    
                        {{-- <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <form action="{{ route('roles.destroy' , $role->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
                                
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                    
                            </form>
                        </div> --}}
                        
                    </div>   
                </td>
            </tr>
        @endforeach

    @endif
</table>
@endsection 




