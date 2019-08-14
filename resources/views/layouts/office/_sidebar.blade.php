<!-- Sidebar -->
<div class="bg-light border-right noprint" id="sidebar-wrapper">
  <div class="sidebar-heading">
	ZAMOLA
  </div>
  <div class="list-group list-group-flush">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
    @if(auth()->user()->role->name === 'staff')
	    <a href="{{ route('bookings') }}" class="list-group-item list-group-item-action bg-light">Orders Pool</a>
	    <a href="{{ route('bookings.assignments') }}" class="list-group-item list-group-item-action bg-light">My Bookings</a>
	@else
		<a href="{{ route('duties') }}" class="list-group-item list-group-item-action bg-light">Duties</a>
    @endif
  </div>
</div>
<!-- /#sidebar-wrapper -->