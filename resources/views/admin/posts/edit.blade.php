@extends('admin.layouts.default')

@section('styles')
	<link rel="stylesheet" href="{{ asset('vendor/selectize/css/selectize.bootstrap3.css') }}">
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
						<div class="box-header">
							<h3 class="box-title">Post Editor
							<small>Markdown Editor</small>
							</h3>
						</div>
						<div class="box-body pad">
							<form method="post" action="{{ route('admin.posts.update', $post->slug) }}" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="title" class="col-sm-1 control-label">Title</label>
									<div class="col-sm-11">
										<input class="form-control" name="title" id="title" placeholder="title" value="{{ Request::old('title') ? Request::old('title') : isset($post) ? $post->title : '' }}">
									</div>
								</div>
								<div class="form-group">
									<label for="categories" class="col-sm-1 control-label">Select categories</label>
									<div class="col-sm-11">
										<select class="form-control" name="category">
											<option value="{{ Request::old('category') ? Request::old('category') : isset($post) ? $post->category->id : '' }}">@if(isset($post)) {{ $post->category->name }} @else Select Category @endif</option>
											@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="image" class="col-sm-1 control-label">Image</label>
									<div class="col-sm-5">
										<div id="actions">
											<div class="row">
												<div class="col-lg-12">
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
															<span>Update Image</span><input type="file" name="image" id="uploadBtn" style="display: none;">
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="description" class="col-sm-1 control-label">Teaser</label>
									<div class="col-sm-11">
										<input class="form-control" name="teaser" id="description" placeholder="description" value="{{ Request::old('teaser') ? Request::old('teaser') : isset($post) ? $post->teaser : '' }}">
									</div>
								</div>
								<textarea id="input" name="content" >{{ Request::old('content') ? Request::old('content') : isset($post) ? $post->content : '' }}</textarea>

								<div class="form-group" style="margin-top: 17px;">
									<label for="tag_list" class="col-sm-1 control-label">Tags</label>
									<div class="col-sm-11">
										<input type="text" name="tags" id="tags">
										<script>
											var tags = [
											    @foreach ($post->tags as $posttag)
											    	{tag: "{{$posttag->name}}" },
											    @endforeach
											];
										</script>
									</div>
								</div>

								<button name="publish" type="submit" class="btn btn-lg btn-success btn-flat pull-right">
								Save Post
								</button>
								{{-- <button name="save" type="submit" class="btn btn-lg btn-warning btn-flat pull-right">
								Draft Post
								</button> --}}
								<div class="checkbox">
						            <label style="font-size: 1.1em">
						            	<input type="hidden" value="1" name="save">
						                <input type="checkbox" value="0" name="save">
						                Draft Post
						            </label>
						        </div>
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

@section('scripts')
	<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
	<script>
		var editor_config = {
			path_absolute : "{{ URL::to('/') }}/",
			selector: "textarea",
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern codesample"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media codesample",
			height: 500,
			codesample_languages: [
		        {text: 'HTML/XML', value: 'markup'},
		        {text: 'JavaScript', value: 'javascript'},
		        {text: 'CSS', value: 'css'},
		        {text: 'PHP', value: 'php'},
		        {text: 'Ruby', value: 'ruby'},
		        {text: 'Python', value: 'python'},
		        {text: 'Java', value: 'java'},
		        {text: 'C', value: 'c'},
		        {text: 'C#', value: 'csharp'},
		        {text: 'C++', value: 'cpp'}
		    ],
			relative_urls: false,
			file_browser_callback : function(field_name, url, type, win) {
				var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
				var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

				var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
				if(type == 'image') {
					cmsURL = cmsURL + "&type=Images";
				} else {
					cmsURL = cmsURL + "&type=Files";
				}

				tinyMCE.activeEditor.windowManager.open({
					file: cmsURL,
					title: 'Filemanager',
					width: x * 0.8,
					height: y * 0.8,
					resizable: "yes",
					close_previous: "no"
				});
			}
		};

		tinymce.init(editor_config);
	</script>

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
	<script src="{{ asset('vendor/selectize/js/selectize.js') }}"></script>
	<script>
		$('#tags').selectize({
	        delimiter: ',',
	        persist: false,
	        valueField: 'tag',
	        labelField: 'tag',
	        searchField: 'tag',
	        options: tags,
	        create: function(input) {
	            return {
	                tag: input
	            }
	        }
	    });
	</script>
@endsection
