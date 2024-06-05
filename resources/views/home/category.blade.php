<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{request()->is('home') ? 'active' : ''}}"><a href="{{route('home.dashboard')}}">Trang chủ</a></li>
                @foreach ($listParentCate as $parent)
                <li class="{{isset($idCate) && $idCate == $parent->id_category ? 'active' : ''}}"><a href="{{route('category.home',['id' => $parent->id_category])}}">{{$parent->name}}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
