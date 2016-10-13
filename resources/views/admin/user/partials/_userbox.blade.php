<div class="box box-primary">
	<div class="box-body box-profile">
		<img class="profile-user-img img-responsive img-circle" src="{{ $user->hasAvatar() ? '/uploads/avatars/' . $user->avatar : '/img/user.png' }}" alt="User profile picture">

		<h3 class="profile-username text-center">{{ $user->getNameorUsername() }}</h3>

		<p class="text-muted text-center">Software Developer</p>
	</div>
	<!-- /.box-body -->
</div>