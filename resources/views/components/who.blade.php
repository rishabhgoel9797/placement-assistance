@if(Auth::guard('web')->check())
<p class="text-success">You are logged in as an institute</p>
@else
<p class="text-danger">
<p>You are logged out as an institute</p>
</p>
@endif

@if(Auth::guard('teacher')->check())
<p class="text-success">You are logged in as a teacher</p>
@else
<p class="text-danger">
<p>You are logged out as a teacher</p>
</p>
@endif