@extends('layouts.app')

@section('main_content')

    <section class="container">
    
        <h1>Modifica il prodotto: {{$comic->title}}</h1>

        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form action="{{ route('comics.update', ['comic'=> $comic->id]) }}" method="post">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}" >
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$comic->author}}" >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$comic->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{$comic->image}}" >
                <img src="{{$comic->image}}" style="max-height:150px" alt="{{$comic->title}}">
            </div>
            
            <input type="submit" class="btn btn-success" value="Modifica il prodotto">

        </form>
        
        
    </section>

@endsection