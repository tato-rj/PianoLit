@include('admin.pages.users.show.title', ['title' => 'Favorites (' . $user->favorites_count . ')'])

<div class="row">
  <div class="col-12">
    @include('admin.pages.users.show.favorites.table')
  </div>
</div>
