<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        {{App\Models\Language::count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active">
                        <a class="menu-item" href="{{route('admin.languages')}}" data-i18n="nav.dash.ecommerce"> عرض
                            الكل </a>
                    </li>
                    <li>
                        <a class="menu-item" href="{{route('admin.languages.create')}}"
                            data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"> {{App\Models\User::count()}}</span>

                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.user')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.user.create')}}" data-i18n="nav.dash.crypto">أضافة
                            مستخدم </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"> {{App\Models\Product::count()}}</span>

                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.product')}}" data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.product.create')}}" data-i18n="nav.dash.crypto">أضافة
                            منتج </a>
                    </li>
                </ul>
            </li>

        </ul>


    </div>
</div>
