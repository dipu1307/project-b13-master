@extends('backend.master')

@section('page_content')


    <div class="container p-3">

        <a href="{{ route('category_index')}}">Category List </a>
        <div class="border border-1 p-3">
            <p>Category Title : {{ $category->title ?? 'No Title '}}</p>
            <p>Category Description : {!! $category->description !!}</p>

        </div>


    </div>



@endsection