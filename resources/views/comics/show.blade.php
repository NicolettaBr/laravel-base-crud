@extends('layouts.app')

@section('main_content')

    <section class="container">

        <h1>Dettagio del fumetto:</h1>
        
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$comic->image}}" alt="{{$comic->title}}">
            <div class="card-body">

                <h5 class="card-title">Title: {{$comic->title}}</h5>
                <h6 class="card-author">Author: {{$comic->author}}</h6>
                @if($comic->description)
                <p class="card-text">{{$comic->description}}</p>
                @endif
                
            </div>
        </div>

    </section>

@endsection