@extends('admin.layouts.index')

@section('content')
    <h1>Slider</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>    
    @endif
    <a href="/admin/slider/create" class="btn btn-primary mb-3">Add Slider</a>


    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Button Text</th>
                <th>Button Url</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td><img src="{{asset($item->img)}}" alt="" style="width: 70px"></td>
                    <td>{{$item->button_text}}</td>
                    <td>{{$item->button_url}}</td>
                    <td>
                        <a href="/admin/slider/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                        {!! Form::open(['url' => '/admin/slider/'.$item->id, 'method' => 'DELETE']) !!}
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