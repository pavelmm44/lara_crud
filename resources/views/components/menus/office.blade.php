<div class="card">
    <div class="card-header">
        Sidebar
    </div>
    <ul class="list-group">
        <li>
            <a href="{{ route('events.index') }}" class="list-group-item">Events</a>
        </li>
        <li>
            <a href="{{ route('messages.index') }}" class="list-group-item">Messages</a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}" class="list-group-item">Profile</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post" class="list-group-item">
                @csrf
                <button>Logout</button>
            </form>
        </li>
    </ul>
</div>
