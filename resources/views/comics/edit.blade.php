@extends('layouts.template')

@section('title')
    Modifica Fumetto
@endsection

@section('content')
    <main>
        <div class="al-jumbo"></div>

        <div class="container al-cur-edit position-relative py-5">

            <form action="{{ route('comics.update', $comic) }}" method="POST" class="row px-3">
                @csrf
                @method("PUT")

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" value="{{$comic->title}}" placeholder="Titolo...">
                    
                    @if ($errors->has("title"))
                        <div class="text-danger">
                            {{$errors->first("title")}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="thumb">Immagine</label>
                    <input type="text" name="thumb" id="thumb" value="{{$comic->thumb}}" placeholder="Immagine...">

                    @if ($errors->has("thumb"))
                        <div class="text-danger">
                            {{$errors->first("thumb")}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="description">Descrizione</label>
                    <input type="text" name="description" id="description" value="{{$comic->description}}" placeholder="Descrizione...">

                    @if ($errors->has("description"))
                        <div class="text-danger">
                            {{$errors->first("description")}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="price">Prezzo</label>
                    <input type="text" name="price" id="price" value="{{$comic->price}}" placeholder="Prezzo...">

                    @if ($errors->has("price"))
                        <div class="text-danger">
                            {{$errors->first("price")}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="series">Serie</label>
                    <input type="text" name="series" id="series" value="{{$comic->series}}" placeholder="Serie...">

                    @if ($errors->has("series"))
                        <div class="text-danger">
                            {{$errors->first("series")}}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 d-flex flex-column py-2">
                    <label for="sale_date">Data di uscita (AAAA-MM-GG)</label>
                    <input type="text" name="sale_date" id="sale_date" value="{{$comic->sale_date}}" placeholder="Data di uscita...">

                    @if ($errors->has("sale_date"))
                        <div class="text-danger">
                            {{$errors->first("sale_date")}}
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <input type="submit" value="Invia">
                </div>
            </form>

            <div class="d-flex justify-content-center align-items-center gap-5 py-5">

                <a href="{{ route('home') }}" class="al-button">Vai alla Home</a>
                <a href="{{ route('comics.show', $comic) }}" class="al-button">Vai al dettaglio del fumetto</a>

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
