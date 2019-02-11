<section>
    <div class="header">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a href="/" class="nav-link">Shop</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
            @if(Auth::check())
                <li class="nav-item"><a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit()">Logout</a></li>
                <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none;">@csrf</form>
                <li class="nav-item"><a href="/user/profile" class="nav-link">Profile</a></li>
            @else
                <li class="nav-item"><a href="/user/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/user/register" class="nav-link">Register</a></li>
            @endif
        </ul>
    </div>
</section>