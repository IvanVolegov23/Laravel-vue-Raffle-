@extends('host.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Raffle Hosting Dashboard</h2>
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
            <th>PIN CODE</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($raffles as $raffle)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $raffle->rafflename }} - {{ $raffle->rafflenumber }} Numbers</td>
            <td>
                @if (Auth::user()->id == $raffle->user_id)
                    <a class="btn btn-primary" href="{{ route('hosts.index', $raffle->user_id) }}">PIN</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
  
    <!-- {!! $raffles->links() !!} -->
      
@endsection
