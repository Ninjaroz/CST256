<div class="logo">
<h1>CST256</h1>
</div>

<!--  Token stuff to satisfy laravel framework post requirements -->
<meta name="csrf-token" content="{{Session::token() }}">
<div class="navbar">
<a href="/">Home</a>
<a href="/login">Login</a>
<a href="/jobPostings">Job Postings</a>
@if(!empty(Session::get('user')))
<a href="/userProfile">Profile</a>
<a href="/jobCart">Job Cart</a>
@endif
@if(!empty(Session::get('user')) AND Session::get('userPermissions') == 2)
	<a href="/adminManagement">Admin Panel</a>
@endif
</div>
