<div class="sidebar">
    <div class="logo-box"><i class="fa fa-plane"></i> AIRPORT SYSTEM</div>
    <a href="{{ route('passenger.dashboard') }}?page=home"><i class="fa fa-home"></i> Dashboard</a>
   <a href="{{ route('passenger.profile') }}"><i class="fa-solid fa-user"></i> My Profile</a>
    <a href="{{ route('passenger.flight-finder') }}"><i class="fa fa-search"></i> Flight Finder</a>
    <a href="{{ route('passenger.flight-schedule') }}"><i class="fa fa-calendar"></i> Flight Schedule</a>
    <a href="{{ route('passenger.notifications') }}">Notifications</a>
    <a href="{{ route('passenger.dashboard') }}?page=help"><i class="fa fa-question-circle"></i> Help & Support</a>
    <a href="/logout" class="logout"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>