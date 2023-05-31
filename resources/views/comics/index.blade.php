@extends('layouts.template')

@section('title')
    Home
@endsection

@section('content')
    <main class="position-relative">

        @if (session()->has("mex"))
            <div class="al-bubble-speech">
                <i class="al-z-index">{{session()->get("mex")}}</i>
                <div class="al-clip"></div>
            </div>
        @endif

        <div class="al-confirm d-none">
            <span>Sei sicuro di voler eliminare questo fumetto?</span>
            <div class="d-flex justify-content-center align-items-center gap-4 pt-3">
                <div onclick="window.alFunc.removeConfirmElement()" class="al-round al-red">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div onclick="window.alFunc.submitFormIndex(event, window.alVar.comicIndex)" class="al-round al-green">
                    <i class="fa-solid fa-check"></i>
                </div>
            </div>
        </div>

        <div class="al-jumbo"></div>

        <div class="container al-cur-ser position-relative py-5">

            <div class="row">

                @for ($i = 0; $i < count($comics); $i++)
                    <div oncontextmenu="window.alFunc.showContextMenu(event)" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 py-4 al-shadow al-context-menu-data">
                        <a href="{{ route('comics.show', $comics[$i]['id']) }}" class="al-card d-flex flex-column gap-2 al-context-menu-dim">
                            <div class="al-img-container">
                                <img src="{{ $comics[$i]['thumb'] }}" alt="err">
                            </div>
                            <strong class="text-center">{{ $comics[$i]['title'] }}</strong>
                        </a>

                        <div class="al-context-menu">
                            <a href="{{route('comics.edit', $comics[$i]['id'])}}" class="al-menu-item">
                                <span>Modifica questo fumetto</span>
                            </a>
                            <div onclick="window.alFunc.askConfirm(event), window.alVar.comicIndex = {{$i}}" class="al-menu-item">
                                <span>Elimina questo fumetto</span>

                                <form action="{{route('comics.destroy', $comics[$i]['id'])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </div>
                        </div>
                    </div>
                @endfor

                <div class="d-flex justify-content-center align-items-center gap-5 py-5">

                    <a href="{{route('comics.create')}}" class="al-button">Aggiungi un fumetto</a>
        
                </div>
            </div>

        </div>

        <div class="al-bg-blue">
            <div class="container d-flex justify-content-center align-items-center">

                <div class="row al-categories">
                    @foreach ($categories as $category)
                        <div
                            class="col-12 col-sm-6 col-md-4 al-col-lg py-3 d-flex justify-content-center align-items-center gap-2">
                            <img src="{{ Vite::asset($category['source']) }}" alt="err">
                            <span class="text-uppercase">{{ $category['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
