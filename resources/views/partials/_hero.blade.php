<section
    class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div
        class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('images/IMG_20230222_234744 (1)-compressed.jpg')">

    </div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            AKS<span class="text-black">Design</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Smagu tave matyti ;-)
        </p>
        @if (Route::has('login'))
            {{--            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
            <div>
                @auth
                    <a href="{{ url('/allproducts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl
               uppercase mt-2 hover:text-black hover:border-black">
                        Prisijungimas
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                            Registracija
                        </a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
</section>
