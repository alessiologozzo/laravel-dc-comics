@extends('layouts.template')

@section('title')
    {{ $comic['title'] }}
@endsection

@section('content')
    <main class="al-bg-white">
        <div class="al-jumbo"></div>
        <div class="al-blue-jumbo">
            <div class="container position-relative">
                <div class="al-img-show">
                    <img src="{{ $comic['thumb'] }}" alt="err">
                </div>
            </div>
        </div>

        <div class="container py-5 al-p">
            <h2 class="py-3 text-center">{{ $comic['title'] }}</h2>
            <p>{{ $comic['description'] }}</p>

            <div class="row">
                <h3 class="text-center pt-5 pb-3">Talents</h3>

                <div class="col-3">
                    <strong>Art by:</strong>
                </div>

                <div class="col-9 d-flex justify-content-end flex-wrap">
                    @for ($i = 0; $i < count($artists); $i++)
                        <span class="al-blue">{{ $artists[$i]->name }}</span>
                        @if ($i + 1 < count($artists))
                            <span class="al-ps pe-2">, </span>
                        @endif
                    @endfor
                </div>

                <div class="col-3 pt-3">
                    <strong>Written by:</strong>
                </div>
    
                <div class="col-9 d-flex justify-content-end flex-wrap pt-3">
                    @for ($i = 0; $i < count($writers); $i++)
                        <span class="al-blue">{{ $writers[$i]->name }}</span>
                        @if ($i + 1 < count($writers))
                            <span class="al-ps pe-2">, </span>
                        @endif
                    @endfor
                </div>

            </div>

            <h3 class="pt-5 text-center">Specs</h3>
            <div class="row">
                <div class="col-5 pt-3">
                    <strong>Series: </strong>
                </div>
                <div class="col-7 pt-3">
                    <div class="d-flex justify-content-end">{{$comic["series"]}}</div>
                </div>

                <div class="col-5 pt-3">
                    <strong>U.S. Price: </strong>
                </div>
                <div class="col-7 pt-3">
                    <div class="d-flex justify-content-end">{{$comic["price"]}}</div>
                </div>

                <div class="col-5 pt-3">
                    <strong>On sale date: </strong>
                </div>
                <div class="col-7 pt-3">
                    <div class="d-flex justify-content-end">{{$comic["sale_date"]}}</div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center gap-5 py-5">

                <a href="{{ route('home') }}" class="al-button">Torna alla Home</a>

            </div>
        </div>
    </main>
@endsection
