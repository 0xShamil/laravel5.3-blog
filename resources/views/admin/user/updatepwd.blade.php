@extends('admin.layouts.default')

@section('content-header')
	<section class="content-header">
		<h1>
			Profile
		</h1>
    </section>
@endsection

@section('content')
	<section class="content">

		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				@include('admin.user.partials._userbox')
				<!-- /.box -->

				<!-- About Me Box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">About Me</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<p class="text-muted">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta omnis, aperiam reprehenderit ullam aut saepe earum repellat, quisquam mollitia ut quae explicabo alias est fugit?
						</p>
					</div>
				<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
				<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Update Password</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" action="{{ route('admin.user.updatepwd', $user->username) }}">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="Username">Username:</label>
								<input class="form-control" name="Username" placeholder="Username" value="{{ $user->username }}" disabled="true">
							</div>
							<div class="form-group">
								<label for="old_password">Current Password:</label>
								<input type="password" class="form-control" name="old_password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="password">New Password:</label>
								<input type="password" class="form-control" name="password" placeholder="New Password">
							</div>
							<div class="form-group">
								<label for="password_confirmation">Confirm Password:</label>
								<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button class="btn btn-primary btn-lg btn-flat">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</section>
	<!-- /.content -->
@endsection