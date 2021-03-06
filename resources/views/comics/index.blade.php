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

                            <a href="{{ route('comics.edit', [
                                'comic' => $comic->id
                            ]) }}" class="btn btn-success">Modifica Prodotto</a>

                            <form action="{{route('comics.destroy', [ 'comic'=> $comic->id ])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Cancella">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        
        
    </section>

@endsection