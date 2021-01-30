@extends('host.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hosts.index', Auth::user()->id) }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('hosts.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Statu:</strong>
                    <select class="form-control" id="statu" name="statu">
                        @if ($product->statu == "Open")
                            <option selected>Open</option>
                            <option>Pending Payment</option>
                            <option>Paid</option>
                        @elseif ($product->statu == "Pending Payment")
                            <option>Open</option>
                            <option selected>Pending Payment</option>
                            <option>Paid</option>
                        @elseif ($product->statu == "Paid")
                            <option>Open</option>
                            <option>Pending Payment</option>
                            <option selected>Paid</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Method:</strong>
                    <select class="form-control" id="method" name="method">
                        @if ($product->method == "CashApp")
                            <option selected>CashApp</option>
                            <option>PayPal</option>
                            <option>Zelle</option>
                        @elseif ($product->method == "PayPal")
                            <option>CashApp</option>
                            <option selected>PayPal</option>
                            <option>Zelle</option>
                        @elseif ($product->method == "Zelle")
                            <option>CashApp</option>
                            <option>PayPal</option>
                            <option selected>Zelle</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection