@extends('layouts.app')

@section('main_content')

    <section class="container">
    
        <h1>Lista dei fumetti:</h1>

        <div class="row">

            @foreach($comics as $comic)
                <div class=col-3>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $comic->image }}" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <a href="{{ route('comics.show', [
                                'comic' => $comic->id
                            ]) }}" class="btn btn-primary">Maggiori dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        
    </section>

@endsection