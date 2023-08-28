@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Product
            </div>

            <div class="card-body p-2">

                <form action="{{ route('product_store')}}" method="POST">

                    @csrf

                    <label>Select Category</label>
                    <select class="form-select" name="category_id">

                        @foreach ($categories as $cat)
                         <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
                        @endforeach
                    </select>

                    <label>Title</label>
                    <input type="text" name="title" class="form-control"/>

                    <label>Description</label>
                    <textarea id="editor" type="text" name="description" class="form-control"></textarea>

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