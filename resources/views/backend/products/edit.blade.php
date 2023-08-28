@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                EDIT Product
            </div>

            <div class="card-body p-2">

                <form action="{{ route('product_update', $product->id)}}" method="POST">

                    @csrf
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}"/>

                    <label>Description</label>
                    <textarea id="editor" type="text" name="description" class="form-control">
                        {{ $product->description }}
                    </textarea>

                    <button type="submit" class="btn btn-sm btn-primary mt-4"> Save</button>
                </form>

            </div>


        </div>
    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection