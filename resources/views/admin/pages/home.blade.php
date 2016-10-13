@extends('admin.layouts.default')

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
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-aqua">
						<i class="fa fa-pencil-square-o"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">Posts</span>
						<span class="info-box-number">{{ $posts }}</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-orange">
						<i class="fa fa-th-large"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">Categories</span>
						<span class="info-box-number">{{ $categories }}</span>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-purple">
						<i class="fa fa-users"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">Users</span>
						<span class="info-box-number">{{ $users }}</span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->

	</section>
@endsection