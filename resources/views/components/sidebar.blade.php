
    <div class="sidebar-container">
      <!-- <div class="logo">
        <img src="img/logo.svg" alt="logo" class="logo" />
      </div> -->
      <div class="profile">
        <a href="{{ route('profile.show', ['id' => auth()->user()->id]) }}" class="w3-bar-item w3-button"><img src="{{ asset('img/profile/'. ($user->image_path ?? 'profile.svg')) }}" alt="Avatar" class="avatar" /></a>
      </div>
      <div class="bar">
        <a href="{{ route('home') }}" class="w3-bar-item w3-button"><img src="{{ asset('img/home.svg') }}"class="home" alt="home" /></a>
      </div>
      <div class="bar">
        <a href="{{ route('post.create') }}" class="w3-bar-item w3-button" ><img src="{{ asset('img/plus.svg') }}" class="plus" alt="plus" /></a>
      </div>
      <div class="logout">
        <a  href="{{ route('logout') }}" class="w3-bar-item w3-button"><img src="{{ asset('img/logout.svg') }}" class="out" alt="logout" /></a>
      </div>
    </div>