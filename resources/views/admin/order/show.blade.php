@extends('admin.layouts.index')

@section('content')
    <h1>Information about an order</h1>
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
                <th>Image Product</th>
                <th>Name Product</th>
                <th>Price Product</th>
                <th>Quantity Product</th>
                <th>TotalSum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->order_id}}</a></td>
                    <td><img src="{{asset($item->product_img)}}" alt="" style="width: 70px"></td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->product_price}}</td>
                    <td>{{$item->product_qty}}</td>
                    <td>{{$item->product_qty * $item->product_price}}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-weight-bold">
                <td colspan="5" class="text-right"></td>
                <td>Total:</td>
                <td>
                    {{$totalSum[0]->totalSum}}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection


@section('js')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection