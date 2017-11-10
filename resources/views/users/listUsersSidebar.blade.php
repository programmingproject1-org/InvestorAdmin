<nav class="col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*users') ? 'active' : '' }}" href="{{ route('users.index') }}">All Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*brokerage*') ? 'active' : '' }}" href="{{ route('brokerage.edit') }}" href="">Brokerage Fees</a>
        </li>
</nav>