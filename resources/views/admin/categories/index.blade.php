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
		<section class="content">
			<h1>Categories</h1>
			@can('create', App\Models\Category::class)
				<a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-lg btn-primary btn-flat" style="margin-bottom: 15px;">Add new category
				</a>
			@endcan
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">All Categories</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							@if($categories->count())
								<table class="table table-hover">
									<tbody>
										<tr>
											<th>Category Name</th>
											<th>Slug</th>
											<th>Icon</th>
										</tr>
										@foreach($categories as $category)
											<tr>
												<td>{{ $category->name }}</td>
												<td>{{ $category->slug }}</td>
												<td><i class="{{ $category->icon }}" aria-hidden="true"></i></td>
												<td class="col-sm-3">
													<div class="btn-group">
														@can('update', App\Category::class)
															<a href="{{ route('admin.categories.show', $category->slug) }}" type="button" class="btn btn-success">
															View posts
															</a>
															<a href="{{ route('admin.categories.edit', $category->slug) }}" type="button" class="btn btn-warning">
															Edit
															</a>
															<a id="delete-btn" href="{{ route('admin.categories.destroy', $category->slug) }}" class="btn btn-danger">Delete</a>
														@endcan
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							@else
								<p>No Categories yet :(</p>
							@endif

							<div class="pager">
                                {{ $categories->render() }}
                            </div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div> <!-- col -->
			</div> <!-- row -->
		</section>
	</section>
@endsection

@section('scripts')
	@include('admin.partials.confirmdel')
@endsection
