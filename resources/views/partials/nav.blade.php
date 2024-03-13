<nav>
    <!--{{dump(request()->path())}}-->
    <!--{{dump(request()->url())}}-->
    <!--
        <pre>{{ request() }}</pre>
        <pre>{{ dump(request()) }}</pre>
        <pre>{{ dump(request()->url()) }}</pre> 
        -->
    <ul>
        <li class="{{ setActive('home')}}"><a href="/">Home</a></li>
        <li class="{{ setActive('about')}}"><a href="/about">About</a></li>
        <li class="{{ setActive('portfolio')}}"><a href="/portfolio">Portfolio</a></li>
        <li class="{{ setActive('contact')}}"><a href="/contact">Contact</a></li>
        <!--<li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="/">Home</a></li>
            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="/about">About</a></li>
            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="/portfolio">Portfolio</a></li>
            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
        -->
    </ul>
</nav>