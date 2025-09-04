<div class="list-group list-group-flush">
    <a class="list-group-item list-group-item-action {{ request()->is('categories*') ? 'active' : '' }}"
       href="{{ route('categories.index') }}">📂 Categories</a>

    <a class="list-group-item list-group-item-action {{ request()->is('books*') ? 'active' : '' }}"
       href="{{ route('books.index') }}">📚 Books</a>

    <a class="list-group-item list-group-item-action {{ request()->is('orders*') ? 'active' : '' }}"
       href="{{ route('orders.index') }}">🧾 Orders</a>

    <a class="list-group-item list-group-item-action {{ request()->is('users*') ? 'active' : '' }}"
       href="{{ route('users.index') }}">👤 Users</a>
</div>
