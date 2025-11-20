<header>
    
    <div class="menu-btn">
        <div class="menu-btn__burger">

        </div>
    </div>
    <nav class="nav">
        <ul class="menu-nav">
            <li class="menu-nav__item {{ request()->is('/') ? 'active' : '' }}">
                <a href="/" class=" menu-nav__link">Home</a>
            </li>
            <li class="menu-nav__item {{ request()->is('about') ? 'active' : '' }}">
                <a href="/about" class="menu-nav__link">About Me</a>
            </li>
            <li class="menu-nav__item {{ request()->is('myproject') ? 'active' : '' }}">
                <a href="/myproject" class="menu-nav__link">Project</a>
            </li>
            <li class="menu-nav__item {{ request()->is('contacts/create') ? 'active' : '' }}">
                <a href="/contacts/create" class="menu-nav__link">Contact</a>
            </li>

        </ul>

    </nav>

    
</header>


