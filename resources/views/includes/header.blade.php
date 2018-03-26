<div class="logo">
<h1>CST256</h1>
</div>
<!-- TODO: display active class depending on which page the user is currently on -->
<div class="navbar">
<a href="/">Home</a>
<a href="/login">Login</a>
@if(!empty(Session::get('user')))
<a href="/userProfile">Profile</a>
@endif
@if(!empty(Session::get('user')) AND Session::get('userPermissions') == 2)
	<a href="/adminManagement">Admin Panel</a>
@endif
</div>
