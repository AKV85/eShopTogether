<nav class="flex justify-between items-center mb-4">
    <a href="/"
    ><img class="logo pl-2 pt-2"
          src="{{asset('images/TSLogo.png')}}" alt="logo"
        /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        <li>
            <a href="{{route('allproducts')}}" class="hover:text-laravel">
                {{__('general.meniu.addresses')}}
            </a>
        </li>
        <li>
            <a href="{{route('allproducts')}}" class="hover:text-laravel">
                {{__('general.meniu.categories')}}
            </a>
        </li>
        <li>
            <a href="{{route('allproducts')}}" class="hover:text-laravel">
                {{__('general.meniu.orders')}}
            </a>
        </li>
        <li>
            <a href="{{route('allproducts')}}" class="hover:text-laravel">
                {{__('general.meniu.persons')}}
            </a>
        </li>
        <li>
            <a href="{{route('allproducts')}}" class="hover:text-laravel">
                {{__('general.meniu.products')}}
            </a>
        </li>
        <li>
            <div>
                @if(app()->getLocale() == 'en')
                    <a href="{{url()->current()}}?lang=lt">LT</a>
                @else
                    <a href="{{url()->current()}}?lang=en">EN</a>
                @endif
            </div>
        </li>
    </ul>
</nav>
