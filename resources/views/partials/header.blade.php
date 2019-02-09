<section>
    <div class="header">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Cart</a></li>
            @if(Auth::check())
                <li class="nav-item"><a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit()">Logout</a></li>
                <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none;">@csrf</form>
            @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endif
        </ul>
    </div>
</section>