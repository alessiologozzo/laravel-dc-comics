<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-4 py-4 ">
                        <h4 class="d-flex justify-content-center justify-content-md-start text-uppercase pb-2">dc comics
                        </h4>
                        @foreach ($dcComics as $dcComic)
                            <div class="d-flex justify-content-center justify-content-md-start text-capitalize al-grey">
                                {{ $dcComic }}</div>
                        @endforeach

                        <h4 class="d-flex justify-content-center justify-content-md-start text-uppercase pt-4 pb-2">shop
                        </h4>
                        @foreach ($shops as $shop)
                            <div class="d-flex justify-content-center justify-content-md-start text-capitalize al-grey">
                                {{ $shop }}</div>
                        @endforeach
                    </div>

                    <div class="col-12 col-md-4 py-4">
                        <h4 class="d-flex justify-content-center justify-content-md-start text-uppercase pb-2">dc</h4>
                        @foreach ($dcs as $dc)
                            <div class="d-flex justify-content-center justify-content-md-start al-grey">
                                {{ $dc }}</div>
                        @endforeach
                    </div>

                    <div class="col-12 col-md-4 py-4 pb-2">
                        <h4 class="d-flex justify-content-center justify-content-md-start text-uppercase">sites</h4>
                        @foreach ($sites as $site)
                            <div class="d-flex justify-content-center justify-content-md-start al-grey">
                                {{ $site }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="al-bg-grey py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="al-button-footer text-uppercase my-2">sign up now!</div>

                <div class="d-flex justify-content-between align-items-center gap-3 my-2">
                    <h5 class="text-uppercase al-blue">follow us</h5>

                    <img src="{{Vite::asset('resources/img/footer-facebook.png')}}" alt="facebook">

                    <img src="{{Vite::asset('resources/img/footer-twitter.png')}}" alt="twitter">

                    <img src="{{Vite::asset('resources/img/footer-youtube.png')}}" alt="youtube">

                    <img src="{{Vite::asset('resources/img/footer-pinterest.png')}}" alt="pinterest">

                    <img src="{{Vite::asset('resources/img/footer-periscope.png')}}" alt="periscope">
                </div>
            </div>
        </div>
    </div>
</footer>
