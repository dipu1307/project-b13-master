@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                EDIT Category
            </div>

            <div class="card-body p-2">

                <form action="{{ route('category_update', $category->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <label>Title</label>
                    <input type="text"  value="{{ $category->title}}" name="title" class="form-control"/>

                    <label>Image</label>
                    <input  type="file" class="form-control" name="image"/>

                    <label>Description</label>
                    <textarea id="editor" type="text" name="description" class="form-control">
                        {!! $category->description !!}
                    </textarea>

                    <button type="submit" class="btn btn-sm btn-primary mt-4"> Update Category</button>
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