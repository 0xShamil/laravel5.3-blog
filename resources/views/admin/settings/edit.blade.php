@extends('admin.layouts.default')

@section('content-header')
	<section class="content-header">
		<h1>
			Blog Settings
		</h1>
    </section>
@endsection

@section('content')
	<section class="content">
		<div class="row">
				<!-- /.col -->
			<div class="col-md-10">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Current Settings</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form id="update-form" role="form" method="post" action="{{ route('admin.settings.update', $setting->id) }}">
                        {{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="blog_name">Blog Name:</label>
								<input class="form-control" name="blog_name" placeholder="Name of the blog" value="{{ $setting->blog_name }}">
							</div>
							<div class="form-group">
								<label for="blog_title">Blog Title:</label>
								<input class="form-control" name="blog_title" placeholder="Introductory title" value="{{ $setting->blog_title }}">
							</div>
							<div class="form-group">
								<label for="blog_description">Blog description:</label>
								<input class="form-control" name="blog_description" placeholder="Brief description" value="{{ $setting->blog_description }}">
							</div>
							<div class="form-group">
								<label for="blog_about">About this blog:</label>
								<textarea class="form-control" name="blog_about" rows="5" id="blog_about">{{ $setting->blog_about }}</textarea>
							</div>
							<div class="form-group">
								<label for="blog_copyright">Copyright policies:</label>
								<textarea class="form-control" name="blog_copyright" rows="5" id="blog_copyright">{{ $setting->blog_copyright }}</textarea>
							</div>
							<div class="form-group">
								<label for="blog_privacy">Privacy policies:</label>
								<textarea class="form-control" name="blog_privacy" rows="5" id="blog_privacy">{{ $setting->blog_privacy }}</textarea>
							</div>
							<div class="form-group">
								<label for="blog_facebook">Facebook page:</label>
								<input class="form-control" name="blog_facebook" placeholder="Facebook page link" value="{{ $setting->blog_facebook }}">
							</div>
                            <div class="form-group">
								<label for="blog_twitter">Twitter account:</label>
								<input class="form-control" name="blog_twitter" placeholder="Twitter account link" value="{{ $setting->blog_twitter }}">
							</div>

                            <div class="box-footer">
    							<button class="btn btn-primary btn-lg btn-flat pull-right">Update</button>
    						</div>
						</div>
						<!-- /.box-body -->

					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
@endsection
