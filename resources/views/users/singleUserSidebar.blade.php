<nav class="col-md-2 d-none d-sm-block bg-light sidebar">
    <p class="pl-md-2"><strong>{{ $user->email }}</strong></p>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*overview') ? 'active' : '' }}" href="{{ route('users.show', ['id' => $user->id]) }}">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*portfolio') ? 'active' : '' }}" href="{{ route('users.portfolio', ['id' => $user->id]) }}">Portfolio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*history') ? 'active' : '' }}" href="{{ route('users.history', ['id' => $user->id]) }}">History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*edit') ? 'active' : '' }}" href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*dangerzone') ? 'active' : '' }}" href="{{ route('users.dangerzone', ['id' => $user->id]) }}">Danger Zone</a>
        </li>
</nav>