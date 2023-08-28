@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-body p-4">

                <a href="{{ route('category_create')}}" class="btn btn-sm btn-primary mb-3"> <i class="fa-solid fa-plus"></i> Add Category</a>

                <a  href="{{ route('category_trashed')}}" class="btn btn-sm btn-warning mb-3"> <i class="fa-solid fa-trash-can"></i> Trash List <span class="font-weight-bold">{{ $deleteItemCounts ?? 0}}</span></a>

                <a  href="{{ route('category_pdf')}}" class="btn btn-sm btn-success mb-3"> <i class="fa-solid fa-file-pdf"></i> Download PDF</a>
                <a  href="{{ route('category_excel')}}"  class="btn btn-sm btn-dark text-white mb-3"> <i class="fa-solid fa-file-excel"></i> Excel</a>
                @php
                    $i = 1;
                @endphp

                <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">Ser No</th>
                        <th scope="col">Title</th>
                        <th>Image</th>
                        <th scope="col">Products</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->title ?? '' }}</td>
                                <td style="width: 160px">
                                    @if(file_exists(storage_path().'/app/public/categories/'.$category->image ) && (!is_null($category->image)))


                                    <img src="{{ asset('storage/categories/'.$category->image) }}" width="150" height="100">

                                    @else
                                    <img src="{{ asset('default.jpg') }}" height="100" width="150">

                                    @endif


                                </td>
                                <td>

                                    @foreach ($category->products as $product)
                                        <span class="badge bg-primary">{{ $product->title }}</span>
                                    @endforeach

                                </td>
                                <td>
                                    <a  href="{{ route('category_show', $category->id)}}" class="btn btn-sm btn-primary">Show</a>
                                    <a  href="{{ route('category_edit', $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a  href="{{ route('category_delete', $category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
        
                            </tr>
                        @endforeach

                  
                      

                     
                    </tbody>
                  </table>


            </div>
        </div>
    </div>



@endsection