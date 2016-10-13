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
        <div class="box box-info">
            @include('admin.includes.flash')
            <div class="box-header with-border">
                <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('admin.categories.store') }}" class="form-horizontal">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="title" class="col-sm-1 control-label">Title</label>
                        <div class="col-sm-11">
                            <input name="name" type="text" class="form-control" id="title" placeholder="Category name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                        <label for="icon" class="col-sm-1 control-label">Icon</label>
                        <div class="col-sm-11">
                            <input name="icon" class="form-control" id="icon" placeholder="fa fa-icon">
                            @if ($errors->has('icon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('icon') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-flat btn-info pull-right">Save category</button>
                    {{-- <button class="btn btn-flat btn-danger" >Delete</button> --}}
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </section>
@endsection