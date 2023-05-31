<header>
    <div class="al-bg-blue">

        <div class="container d-flex justify-content-end align-items-center gap-3 text-uppercase py-2">

            <small>dc power visa</small>
            <small>additional dc sites</small>

        </div>

    </div>


    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('home')}}">
                <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="dc-logo" class="py-3 py-lg-none">
            </a>

            <ul class="d-none d-lg-flex gap-4 text-uppercase">
                @foreach ($links as $link)
                    <li>{{ $link }}</li>
                @endforeach
            </ul>

            <div onclick="window.alFunc.showMenu(event)" class="d-flex d-lg-none al-menu-data position-relative">
                <i class="fa-solid fa-bars al-cursor-pointer"></i>
                <div class="al-menu">
                    @foreach ($links as $link)
                        <div class="al-menu-item text-uppercase">
                            {{$link}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</header>
