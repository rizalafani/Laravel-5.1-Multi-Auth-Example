@extends('app-admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register Admin</div>
				<div class="panel-body">
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

					{!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'url' => 'admin/register']) !!}

						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								{!! Form::text('username', null, ['class' => 'form-control']) !!}
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Firstname</label>
							<div class="col-md-6">
								{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Lastname</label>
							<div class="col-md-6">
								{!! Form::text('lastname', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								{!! Form::password('password', ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Register Admin', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
