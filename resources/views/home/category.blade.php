<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{ route('home.dashboard') }}">Trang chủ</a></li>
                @foreach ($listParentCate as $parent)
                    @php
                        // Kiểm tra xem có bất kỳ đứa con nào của parent này hay không
                        $hasChildren = $listChildrenCate->contains('id_parent', $parent->id_category);
                    @endphp
                    <li class="{{ isset($idCate) && $idCate == $parent->id_category ? 'active' : '' }} nav-parent">
                        <a href="{{ route('category.home', ['id' => $parent->id_category]) }}">{{ $parent->name }}</a>
                        @if ($hasChildren)
                            <div class="nav-child">
                                @foreach ($listChildrenCate as $child)
                                    @if ($child->id_parent == $parent->id_category)
                                        <div>
                                            <a href="{{ route('category.home', ['id' => $child->id_category]) }}" class="cursor-pointer">{{ $child->name }}</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
