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
            <h1>Posts in {{ $category->name }}</h1>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">All posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($posts->count())
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Categories</th>
                                            <th>Actions</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td class="col-md-3">{{ $post->title }}</td>
                                                <td class="col-md-3">{{ $post->teaser }}</td>
                                                <td class="col-md-2">
                                                    <div class="box-body">
                                                        @if($post->image)
                                                            <img class="img-responsive img-thumbnail" alt="Photo" src="/uploads/{{ $post->image }}">
                                                        @else
                                                            No header image uploaded
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="col-md-1">
                                                    <div>
                                                        {{ $post->category->name }}
                                                    </div>
                                                </td>
                                                <td class="col-md-3">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.posts.edit', $post->slug) }}" type="button" class="btn btn-info">Edit</a>
                                                        <a href="{{ route('admin.posts.destroy', $post->slug) }}" id="delete-btn" type="button" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($post->live)
                                                        <b class="label label-info">Published</b>
                                                    @else
                                                        <b class="label label-info">Drafted</b>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                               <div> No posts yet :(</div>
                            @endif

                            <div>
                                <div class="pager"> 
                                    {{ $posts->render() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </section>
@endsection

@section('scripts')
    <script> 
        $(document).on('click', '#delete-btn', function(e) {
            e.preventDefault();
            var link = $(this);
            swal({
                title: "Confirm Delete",
                text: "Are you sure? Item can not be restored later.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
            function(isConfirm){
                if(isConfirm){
                    window.location = link.attr('href');
                }
                else {
                    swal("Cancelled","Category deletion cancelled", "error");
                }
            });
        });
    </script>
@endsection
