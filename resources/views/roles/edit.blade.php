
@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<form  action="{{ route('roles.update',$role) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name"
                value="{{$role->name}}"  required>
            @if ($errors->has('name'))
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @endif

        </div>
    </div>
    <strong style="margin-left: 15px">Permissions:</strong>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            @if ($permissions->count())

            @foreach($permissions as $permission)

                <div class="col-md-3 mb-2">

                    <div class="checkbox text-capitalize">
                        <label
                            for="{{'permission-'.$permission->id}}">
                            <input type="checkbox"
                                    name="permissions[]"
                                    id="{{'permission-'.$permission->id}}"
                                    {{ $permissionNames && in_array($permission->name, $permissionNames)?'checked':''}} value="{{$permission->name}}">
                            {{ str_replace('_', ' ', $permission->name) }}
                        </label>
                    </div>

                </div>


            @endforeach

        @endif

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>

@endsection
