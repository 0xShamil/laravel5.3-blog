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
			</div>
				<!-- /.col -->
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Update Avatar</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body pad">
						<form method="post" action="{{ route('admin.user.avatarupload', $user->username) }}" class="form-horizontal" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-3">
									<div id="actions">
										<div class="row">
											<div class="col-md-12">
											<!-- This is used as the file preview template -->
											<div>
												<span class="preview"><img id="img-preview" height="250" class="img-responsive"></span>
											</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<label class="btn btn-warning btn-flat btn-block fileinput-button">
														<i class="fa fa-edit"></i>
														<span>Update Avatar</span><input type="file" name="avatar" id="uploadBtn" style="display: none;">
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer text-center">
								<button class="btn btn-primary btn-lg btn-flat">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</section>
	<!-- /.content -->
@endsection

@section('scripts')
	<script>
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	                $('#img-preview').attr('src', e.target.result);
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    
	    $("#uploadBtn").change(function(){
	        readURL(this);
	    });
	</script>
@endsection