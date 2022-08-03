
@extends('admin.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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


<form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="_method" value="PUT">

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name"
                value="{{ $user->name }}"  required>
            @if ($errors->has('name'))
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" class="form-control" name="email"
                value="{{ $user->email }}"  required>
            @if ($errors->has('email'))
            <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone Number:</strong>
            <input type="number" class="form-control" name="phone_number"
                value="{{ $user->phone_number }}">
            @if ($errors->has('phone_number'))
            <p class="help is-danger">{{$errors->first('phone_number')}}</p>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input type="password" class="form-control" name="password"
                value="{{old('password')}}"  >
            @if ($errors->has('password'))
            <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            <input type="password" class="form-control" name="confirm-password"
                value="{{old('confirm-password')}}"  >
            @if ($errors->has('confirm-password'))
            <p class="help is-danger">{{$errors->first('confirm-password')}}</p>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {{-- {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!} --}}
            <select class="form-control" name="role_id" id="role_id">

                <option value="">--Choose Role--</option>

                @foreach ($roles as $roleclass)

                    <option value="{{ $roleclass->id }}"
                        {{ $user->roles->pluck('name')->first() == $roleclass->name ? 'selected' : '' }}>
                        {{ $roleclass->name }}
                    </option>

                @endforeach

            </select>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection 