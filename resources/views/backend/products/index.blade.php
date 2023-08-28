@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-body p-4">
                <a href="{{ route('create')}}">Add New Product</a>
                @php
                    $i = 1;
                @endphp

                <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">Ser No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>

                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <th scope="row" class="text-center">{{ $i++ }}</th>
                            <td>{{ $product->title}}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->description }}</td>

                            <td>
                                <button class="btn btn-sm btn-primary">Show</button>
                                <a href="{{ route('product_edit', $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                      </tr>
                    @endforeach
                      

                     
                    </tbody>
                  </table>


            </div>
        </div>
    </div>



@endsection