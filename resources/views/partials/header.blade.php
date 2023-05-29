<header>
    <div class="al-bg-blue">

        <div class="container d-flex justify-content-end align-items-center gap-3 text-uppercase py-2">

            <small>dc power visa</small>
            <small>additional dc sites</small>

        </div>

    </div>


    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="dc-logo" class="py-3 py-lg-none">

            <ul class="d-none d-lg-flex gap-4 text-uppercase">
                @foreach ($links as $link)
                    <li>{{ $link }}</li>
                @endforeach
            </ul>

            <i class="fa-solid fa-bars d-lg-none"></i>
        </div>

    </div>
</header>
