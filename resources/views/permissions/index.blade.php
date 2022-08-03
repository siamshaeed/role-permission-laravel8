@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permission Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th width="280px">Action</th>
 </tr>
@if(count($permissions) > 0)

        @foreach ($permissions as $permission)

            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    <strong class="text-capitalize">
                        {{ str_replace('_', ' ', $permission->name) }}
                    </strong>
                </td>
                
                <td>
                    
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              
              
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <a href="{{ route('permissions.edit' , $permission->id) }}" class="btn btn-success"> Edit </a>
                        </div>
                    
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <form action="{{ route('permissions.destroy' , $permission->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
                                
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

    @endif
</table>
@endsection 



