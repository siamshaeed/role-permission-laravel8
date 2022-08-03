
@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Back</a>
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

<form  action="{{ route('permissions.store') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name"
                value="{{old('name')}}"  required>
            @if ($errors->has('name'))
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @endif

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Guard Name:</strong>
            <input type="text" class="form-control" name="guard_name"
                value="{{old('guard_name')}}"  required>
            @if ($errors->has('guard_name'))
            <p class="help is-danger">{{$errors->first('guard_name')}}</p>
            @endif

        </div>
    </div>
    

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>

@endsection
