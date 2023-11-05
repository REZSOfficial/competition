@extends('layouts.skeleton')
@section('content')

<div class="mt-4">
    <h1 style="color: #332D2D;">Add Competitor</h1>

    <form method="POST" action="/competitors">
        @csrf
        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input name="user_firstname" type="text" class="form-control" id="user_firstname" aria-describedby="emailHelp" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input name="user_lastname" type="text" class="form-control" id="user_lastname" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label for="user_email">Email</label>
            <input name="user_email" type="text" class="form-control" id="user_email" aria-describedby="sportHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="round_competition_name">Competition Name</label>
            <input readonly value="{{$data['competition']->name}}" name="round_competition_name" type="text" class="form-control" id="round_competition_name" aria-describedby="prizeHelp" placeholder="Competition Name">
          </div>
          <div class="form-group">
            <label for="round_competition_date">Competition Date</label>
            <input readonly value="{{$data['competition']->date}}" name="round_competition_date" type="date" class="form-control" id="round_competition_date" aria-describedby="prizeHelp" placeholder="Competition Date">
          </div>
          <div class="form-group">
            <label for="round_competition_round">Competition Round</label>
            <input readonly value="{{$data['round']}}" name="round_competition_round" type="number" class="form-control" id="round_competition_round" aria-describedby="prizeHelp" placeholder="Competition Round">
          </div>
          <button type="submit" class="btn addBtn">Submit</button>
        
    </form>

</div>

@endsection