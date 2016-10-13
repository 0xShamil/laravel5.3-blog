@extends('admin.layouts.default')

@section('styles')
	<link rel="stylesheet" href="dist/css/simplemde.min.css">
@append

@section('content-header')
	<section class="content-header">
		<h1>
		  Admin Panel
		  <small>Let's write awesome content</small>
		</h1>
	</section>
@endsection

@section('content')
	<section class="content">
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header col-md-offset-6">
							<h3 class="box-title" >Add an User
							</h3>
						</div>
						<div class="box-body pad">
							<form method="post" action="{{ route('admin.users.register') }}" class="form-horizontal">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="first_name" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
										<input id="first_name" placeholder="First name " type="text" class="form-control" name="first_name">
						                  @if ($errors->has('first_name'))
						                      <span class="help-block">
						                          <strong>{{ $errors->first('first_name') }}</strong>
						                      </span>
						                  @endif
									</div>
								</div>
								<div class="form-group">
									<label for="last_name" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
										<input id="last_name" placeholder="Surname or last name" type="text" class="form-control" name="last_name">
						                  @if ($errors->has('last_name'))
						                      <span class="help-block">
						                          <strong>{{ $errors->first('last_name') }}</strong>
						                      </span>
						                  @endif
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input id="username" placeholder="Pick an Username * " type="text" class="form-control" name="username">
						                  @if ($errors->has('username'))
						                      <span class="help-block">
						                          <strong>{{ $errors->first('username') }}</strong>
						                      </span>
						                  @endif
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input id="email" placeholder="Enter email *" type="text" class="form-control" name="email">
						                  @if ($errors->has('email'))
						                      <span class="help-block">
						                          <strong>{{ $errors->first('email') }}</strong>
						                      </span>
						                  @endif
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input id="password" placeholder="Password *" type="password" class="form-control" name="password">
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Comfirm Password</label>
									<div class="col-sm-10">
										<input id="password-confirm" placeholder="Password Confirmation *" type="password" class="form-control" name="password_confirmation">
										@if ($errors->has('password_confirmation'))
											<span class="help-block">
												<strong>{{ $errors->first('password_confirmation') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="roles" class="col-sm-2 control-label">User Role</label>
									<div class="col-sm-10">
										<select class="form-control" name="role">
											<option value="">Select Role</option>
											@foreach($roles as $role)
												<option value="{{ $role->id }}">{{ $role->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<button type="submit" class="btn btn-lg btn-success btn-flat col-md-offset-6"><i class="fa fa-btn fa-user"></i> Add User</button>
							</form>
						</div>
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col-->
			</div>
			<!-- ./row -->
		</section>
	</section>
@endsection



