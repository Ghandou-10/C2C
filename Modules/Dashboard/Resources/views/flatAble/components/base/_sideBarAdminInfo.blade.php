<div class="card pc-user-card">
    <div class="card-body">
        <div class="nav-user-image">
            <a data-bs-toggle="collapse" href="#navuserlink">
                <img src="{{ auth()->user()->getAvatar() }}" alt="user-image" class="user-avtar rounded-circle"/>
            </a>
        </div>
        <div class="pc-user-collpsed collapse" id="navuserlink">
            <h4 class="mb-0">{{ auth()->user()->name }}</h4>
            {{--            <span>Administrator</span>--}}
            <ul>
                <li>
                    <a href="{{ route('dashboard.admins.show',auth()->user()) }}" class="pc-user-links">
                        <i class="ph-duotone ph-user"></i>
                        <span>
                            @lang('accounts::admins.my_profile')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="pc-user-links" onclick="event.preventDefault();document.getElementById('logoutFormSidebar').submit()">
                        <i class="ph-duotone ph-power"></i>
                        <span>
                            @lang('admin.auth.logout')
                        </span>
                    </a>
                    <form
                        style="display: none;" action="{{ route('logout') }}" method="post"
                        id="logoutFormSidebar">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
