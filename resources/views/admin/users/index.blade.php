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
            <h1>Users</h1>
            <a href="{{ route('admin.users.add') }}" type="button" class="btn btn-lg btn-primary btn-flat" style="margin-bottom: 15px;">
                Add User
            </a>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users</h3>                        
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            @if($users->count())
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Posts</th>
                                            <th>Author</th>
                                            <th>Editor</th>
                                            <th>Admin</th>
                                        </tr>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td><a href="{{ route('admin.user.profile', $user->username) }}">{{ $user->username }}</a></td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->posts()->count() }}</td>
                                                <form action="{{ route('admin.users.assign') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
                                                    <td><input type="checkbox" {{ $user->hasRole('Editor') ? 'checked' : '' }} name="role_editor"></td>
                                                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                                    <td><input type="hidden" name="email" value="{{ $user->email }}"></td>
                                                    <td><button type="submit" class="btn btn-sm">Change Roles</button></td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No Users yet
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                <!-- /.box -->
                </div>
            </div>
        </section>
    </section>
@endsection