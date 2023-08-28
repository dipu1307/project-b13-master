@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                Create Category
            </div>

            <div class="card-body p-2">
                <form action="{{ route('category_store')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <label>Title</label>
                    <input type="text" name="title"  value="{{ old('title') }}" class="form-control"/>

                    @error('title')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <label>Image</label>
                    <input  type="file" class="form-control" name="image"/>


                    <label>Description</label>
                    <textarea id="editor" type="text" name="description" class="form-control"></textarea>

                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror

                    <div>
                        <button type="submit" class="btn btn-sm btn-primary mt-4"> Save</button>

                    </div>
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