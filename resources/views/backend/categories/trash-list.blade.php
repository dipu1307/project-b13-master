@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-body p-4">

                <a href="{{ route('category_index')}}" class="btn btn-sm btn-primary mb-3"> <i class="fa-solid fa-backward"></i> Back</a>

                
                @php
                    $i = 1;
                @endphp

                <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">Ser No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->title ?? '' }}</td>
                                <td>{!! $category->description ?? '' !!}</td>
                                <td>
                                    <a  href="{{ route('category_restore', $category->id)}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-recycle"></i> Restore</a>
                                    <a  href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Permanent Delete</a>
                                </td>
        
                            </tr>
                        @endforeach

                  
                      

                     
                    </tbody>
                  </table>


            </div>
        </div>
    </div>



@endsection