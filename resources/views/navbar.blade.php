<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <script type="text/javascript">
        var logout = function() {
            console.log(document.getElementById('logout-form'));
            document.getElementById('logout-form').submit();
        };

    </script>

    <a class="navbar-brand" href="/">Notes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>

            @auth
                <li class="nav-item">
                    <form id="logout-form" action="/logout" method="POST">
                        @csrf
                        <a onclick="logout()" class="nav-link">Logout</a>
                    </form>
                </li>
            @endauth

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endguest
    </div>
</nav>
