<nav class="container py-1" style="max-width: 1000px">
    <form action="{{route('user.logout')}}" method="POST">
        @csrf
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2">
                @if (Auth::check())
                <a href="{{route('user.profile', Auth::user()->id)}}" style="text-decoration: none;">
                    <img src="{{ asset(Auth::user()->photo ? 'storage/images/' . Auth::user()->photo : 'default_pfp.jpg') }}" alt="profile_pic" class="rounded-circle" style="width:50px; height:50px;">
                </a>
                @else
                    <img src="{{asset('default_pfp.jpg')}}" alt="profile_pic" style="width:50px; height:50px;">
                @endif
                <a class="fs-2 fw-bold" href="{{route('task.index')}}" style="text-decoration:none; color:black;">Tasks</a>
            </div>
            @if (Auth::check())
                <button class="btn btn-danger">logout</button>
            @else
                <a class="btn btn-success" href="{{route('user.login.form')}}" style="text-decoration:none;">Login</a>
            @endif

        </div>
    </form>
</nav>
