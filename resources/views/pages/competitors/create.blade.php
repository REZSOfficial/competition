@extends('layouts.skeleton')
@section('content')

<div class="mt-4">
    <h1 style="color: #332D2D;">Add Competitor</h1>

    <form method="POST" action="/competitors">
        @csrf
          <div class="form-group form-select">
            <label for="select_user">Select User</label>
            <select name="user" class="form-select form-select-lg mb-3" aria-label="Default select example">
              @foreach ($data['users'] as $user)
                <option value="{{$user->email}} {{$user->firstname}} {{$user->lastname}}">{{$user->firstname}} {{$user->lastname}}</option>  
              @endforeach
            </select>
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
          <input style="display: none" readonly  type="number" name="competition_id" id="competition_id" value="{{$data['competition']->id}}">
          <button type="submit" class="btn addBtn" onclick="submitForm()">Submit</button>
        
    </form>

</div>

@endsection