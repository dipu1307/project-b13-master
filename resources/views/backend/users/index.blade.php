@extends('backend.master')

@section('page_content')

    <div class="container">
        <div class="card">
            <div class="card-body p-4">
                @php
                    $i = 1;
                @endphp

                <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="table-dark">
                        <th scope="col">Ser No</th>
                        <th scope="col">Name</th>
                        <th scope="col">NID</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)

                        <tr>
                            <th scope="row" class="text-center">{{ $i++ }}</th>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->nid ? $user->nid->nid_no : 'No Nid Card' }}</td>
                           
                      </tr>
                    @endforeach
                      

                     
                    </tbody>
                  </table>


            </div>
        </div>
    </div>



@endsection