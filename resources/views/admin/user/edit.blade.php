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
				<div class="text-center">
                    <a href="{{ route('admin.user.avatar', $user->username) }}" type="button" class="btn btn-info text-center"><i class="fa fa-pencil-square-o"></i> Update Avatar</a>
				</div>
			</div>
				<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Edit profile</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form id="update-form" role="form" method="post" action="{{ route('admin.user.update', $user->username) }}">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="first_name">First Name:</label>
								<input class="form-control" name="first_name" placeholder="your first name" value="{{ $user->first_name }}">
							</div>
							<div class="form-group">
								<label for="last_name">Last Name:</label>
								<input class="form-control" name="last_name" placeholder="your last name" value="{{ $user->last_name }}">
							</div>
							<div class="form-group">
								<label for="Username">Username:</label>
								<input class="form-control" name="Username" placeholder="Username" value="{{ $user->username }}" disabled="true">
							</div>
							<div class="form-group">
								<label for="Email">Email address:</label>
								<input type="email" class="form-control" name="Email" placeholder="Enter email" value="{{ $user->email }}" disabled="true">
							</div>
							<div class="form-group">
								<label for="biography">Bio:</label>
								<textarea class="form-control" name="bio" rows="5" id="biography">{{ $user->bio }}</textarea>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button class="btn btn-primary btn-lg btn-flat pull-right">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</section>
	<!-- /.content -->
@endsection
