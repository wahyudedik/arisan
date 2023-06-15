@if (Auth::user()->role == 'superadmin')
    @include('dashboard.superadmin')
@endif
@if (Auth::user()->role == 'admin')
     @include('dashboard.admin')
@endif
@if (Auth::user()->role == 'member')
     @include('dashboard.member')
@endif
