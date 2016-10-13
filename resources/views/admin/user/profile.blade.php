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

				<div>
                    @can('update', $user)
                    	<a href="{{ route('admin.user.edit', $user->username) }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
                    	<a href="{{ route('admin.user.changepwd', $user->username) }}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-lock"></i> Update Password</a>
                    @endcan
				</div>
			</div>
				<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">My profile</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div>
						<div class="box-body">
							<div class="form-group">
								<label for="name">Name:</label>
								<input class="form-control" name="name" placeholder="name" value="{{ $user->getName() }}" disabled="true">
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
								<textarea class="form-control" name="bio" rows="5" id="biography" disabled="true">{{ $user->bio }}</textarea>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</section>
	<!-- /.content -->
@endsection