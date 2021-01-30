@extends('host.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Raffle Hosting</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hosts.create') }}"> Create New Raffle</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Number</th>
            <th>Ticket Buyer Name</th>
            <th>Status</th>
            <th>Payment Method</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->statu }}</td>
            <td>{{ $product->method }}</td>
            <td>
                <form action="{{ route('hosts.destroy',$product->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('hosts.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    <!-- {!! $products->links() !!} -->
      
@endsection