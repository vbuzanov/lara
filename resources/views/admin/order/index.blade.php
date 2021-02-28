@extends('admin.layouts.index')

@section('content')
    <h1>Orders</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>    
    @endif
   
    {{-- <a href="{{asset('admin/category/create')}}" class="btn btn-primary">Add Category</a>

    <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a> --}}

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Number order</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>TotalSum</th>
                <th>Status</th>
                <th>Date order</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/admin/order/{{ $item->id }}">{{ $item->id }}</a></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->adress}}</td>
                    <td>{{$item->totalSum}}</td>
                    <td>{{$item->status->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="/admin/order/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                        {!! Form::open(['url' => '/admin/order/'.$item->id, 'method' => 'DELETE']) !!}
                            <button class="btn btn-danger">DELETE</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('js')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection