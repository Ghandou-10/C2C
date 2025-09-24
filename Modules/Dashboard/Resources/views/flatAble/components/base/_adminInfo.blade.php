<li class="dropdown pc-h-item header-user-profile">
    <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
    >
        <img src="{{ auth()->user()->getAvatar() }}" alt="user-image" class="user-avtar"/>
    </a>
    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        {{--        <div class="dropdown-header d-flex align-items-center justify-content-between">--}}
        {{--            <h4 class="m-0">--}}
        {{--                @lang('accounts::admins.my_profile')--}}
        {{--            </h4>--}}
        {{--        </div>--}}
        <div class="dropdown-body">
            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                <ul class="list-group list-group-flush w-100">
                    {{--                    <li class="list-group-item">--}}
                    {{--                        <div class="d-flex align-items-center">--}}
                    {{--                            <div class="flex-shrink-0">--}}
                    {{--                                <img src="{{ auth()->user()->getAvatar() }}" alt="user-image" class="wid-50 rounded-circle"/>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="flex-grow-1 mx-3">--}}
                    {{--                                <h5 class="mb-0">--}}
                    {{--                                    {{ auth()->user()->name }}--}}
                    {{--                                </h5>--}}
                    {{--                                <a class="link-primary" href="mailto:carson.darrin@company.io">--}}
                    {{--                                    {{ auth()->user()->email }}--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                            <span class="badge bg-primary">PRO</span>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    <li class="list-group-item">
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logoutForm').submit()">
                              <span class="d-flex align-items-center">
                                <i class="ph-duotone ph-power"></i>
                                <span>
                                    @lang('admin.auth.logout')
                                </span>
                              </span>
                        </a>
                        <form
                            style="display: none;" action="{{ route('logout') }}" method="post"
                            id="logoutForm">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</li>



