@extends('layouts.app')

@section('main_content')

    <section>
        <div class="container">

            <h1>Crea un nuovo prodotto!</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('comics.store')}}" method="post">
            @csrf
            @method('POST')

            <form>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" >
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image" >
                </div>
                
                <input type="submit" class="btn btn-primary" value="Salva il nuovo prodotto">

            </form>
            
            
            </form>
        </div>
    </section>

@endsection