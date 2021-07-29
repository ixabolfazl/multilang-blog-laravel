<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">{{ __('Home') }}</a>
        </li>
        <li class="nav-item"><a href="post-category-2.html" class="nav-link">سبک زندگی</a></li>
        <li class="nav-item"><a href="post-category-3.html" class="nav-link">مسافرت</a></li>
        <li class="nav-item"><a href="index.htm#" class="nav-link">صفحات</a>
            <ul class="dropdown-menu">
                <li class="nav-item"><a href="index.htm#" class="nav-link">کلاس دسته بندی</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="post-category-1.html" class="nav-link">دسته بندی 1</a></li>
                        <li class="nav-item"><a href="post-category-2.html" class="nav-link">دسته بندی 2</a></li>
                        <li class="nav-item"><a href="post-category-3.html" class="nav-link">دسته بندی 3</a></li>
                        <li class="nav-item"><a href="post-category-4.html" class="nav-link">دسته بندی 4</a></li>
                        <li class="nav-item"><a href="post-category-5.html" class="nav-link">دسته بندی 5</a></li>
                        <li class="nav-item"><a href="post-category-6.html" class="nav-link">دسته بندی 6</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="index.htm#" class="nav-link">کلاس پست ها</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="single-post-1.html" class="nav-link">پست جداگانه 1</a></li>
                        <li class="nav-item"><a href="single-post-2.html" class="nav-link">پست جداگانه 2</a></li>
                        <li class="nav-item"><a href="single-post-3.html" class="nav-link">پست جداگانه 3</a></li>
                        <li class="nav-item"><a href="single-post-4.html" class="nav-link">پست جداگانه 4</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="index.htm#" class="nav-link">نمایشگاه</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="gallery-1.html" class="nav-link">گالری 1</a>
                        </li>
                        <li class="nav-item"><a href="gallery-2.html" class="nav-link">گالری 2</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a href="author.html" class="nav-link">نویسنده</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">تماس با ما</a></li>
                <li class="nav-item"><a href="login.html" class="nav-link">ورود</a></li>
                <li class="nav-item"><a href="signup.html" class="nav-link">ثبت نام</a></li>
                <li class="nav-item"><a href="404-error.html" class="nav-link">خطای 404</a></li>
                <li class="nav-item"><a href="coming-soon.html" class="nav-link">نسخه به زودی</a>
                </li>
            </ul>
        </li>
        @auth
            <li class="nav-item">
                <a href="m#" class="nav-link"><i class="icofont-user-alt-5"></i> {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                    @can('viewAny','dashboard')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a></li>
                    @endcan
                    @can('viewAny','profile')
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.index') }}" class="nav-link">{{ __('Profile') }}</a></li>
                    @endcan
                    @can('viewAny',App\Models\Setting::class)
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.index') }}" class="nav-link">{{ __('Setting') }}</a></li>
                    @endcan
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit()" class="nav-link">{{__('Logout')}}</a>
                        </form>
                    </li>
                </ul>
            </li>
        @endauth
        @guest
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link"><i class="icofont-user-alt-5"></i>{{__('Register')}}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link"><i class="icofont-user-alt-5"></i> {{__('Login')}}</a>
            </li>
        @endguest
        <li class="nav-item">
            <a href="#" class="nav-link"><img src="{{  asset("assets/app/img/flag/".app()->getLocale().".png")  }}" alt="{{ app()->getLocale() }}-flag"> {{  __(app()->getLocale())  }}
            </a>
            <ul class="dropdown-menu">
                @foreach(config('translatable.locales') as $local)
                    <li class="nav-item"><a href="{{ Route::localizedUrl($local)}}" class="nav-link">
                            <img src="{{  asset("assets/app/img/flag/".$local.".png")  }}" alt="{{ $local }}-flag">
                            {{ __($local) }}</a></li>
                @endforeach
            </ul>
        </li>


    </ul>
    <div class="others-options">
        <ul>
            <li class="header-search">
                <div class="nav-search">
                    <div class="nav-search-button">
                        <i class="icofont-ui-search"></i>
                    </div>
                    <form>
                        <span class="nav-search-close-button" tabindex="0">✕</span>
                        <div class="nav-search-inner">
                            <input type="text" name="search" placeholder="جستجو کنید ....">
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
