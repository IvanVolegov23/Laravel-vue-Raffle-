@extends('host.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Table</h2>
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
            <th>Email</th>
            <th>Raffle Name</th>
            <th>Raffle Price</th>
            <th>Quantity of numbers</th>
            <th>PIN CODE</th>
            <th width="180px">Action</th>
        </tr>
        @foreach ($users as $x => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->email }}</td>

            <?php $y=0 ?>
            @foreach ($raffles as $raffle)
                @if ($raffle->user_id == $user->id)
                    <td>{{ $raffle->rafflename }}</td>
                    <?php $y=1 ?>
                @endif 
            @endforeach
            @if (!$y)
                <td></td>
            @endif

            @foreach ($raffles as $raffle)
                @if ($raffle->user_id == $user->id)
                    <td>{{ $raffle->raffleprice }}</td>
                    <?php $y=1 ?>
                @endif 
            @endforeach
            @if (!$y)
                <td></td>
            @endif

            @foreach ($raffles as $raffle)
                @if ($raffle->user_id == $user->id)
                    <td>{{ $raffle->rafflenumber }}</td>
                    <?php $y=1 ?>
                @endif 
            @endforeach
            @if (!$y)
                <td></td>
            @endif

            @foreach ($raffles as $raffle)
                @if ($raffle->user_id == $user->id)
                    <td>{{ $raffle->pincode }}</td>
                    <?php $y=1 ?>
                @endif 
            @endforeach
            @if (!$y)
                <td></td>
            @endif

            <td>
                @if (!$y)
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('user.create', $user->id) }}">Create</a>
                </div>
                @else
                <form action="{{ route('user.destroy',$user->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
  
    <!-- {!! $users->links() !!} -->
      
@endsection