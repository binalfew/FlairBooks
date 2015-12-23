<div class="topbar-v3">
    <div class="search-open">
        <div class="container">
            <input type="text" class="form-control" placeholder="Search">
            <div class="search-close"><i class="icon-close"></i></div>
        </div>    
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <ul class="left-topbar">
                    <li>
                        @if($signedIn)
                            <a href="/admin">Admin</a>|
                            <a href="#">Account</a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-inline right-topbar pull-right">
                    <li>
                        @if($signedIn)
                            <a href="/logout">Logout</a>|
                            <a href="#">Wishlist (0)</a>
                        @else
                            <a href="/login">Login</a> |
                            <a href="/register">Register</a>
                        @endif
                    </li>
                    <li><i class="search fa fa-search search-button"></i></li>
                </ul>
            </div>
        </div>
    </div>
</div>