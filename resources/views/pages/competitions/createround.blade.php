@extends('layouts.skeleton')
@section('content')

<div class="mt-4">
    <h1 style="color: #332D2D;">Create Round</h1>

    <form method="POST" action="/competitions">
        @csrf
        <div class="form-group">
            <label for="name">Competition Name</label>
            <input readonly name="competition_name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" value="{{$competition->name}}">
            <small id="nameHelp" class="form-text text-muted">Your competition will be available by this name.</small>
          </div>
          <div class="form-group">
            <label for="date">Competition Date</label>
            <input readonly name="competition_date" type="date" class="form-control" id="date" placeholder="Enter date" value="{{$competition->date}}">
          </div>
          <div class="form-group">
            <label for="round">Round</label>
            <input name="round" type="number" class="form-control" id="sport" aria-describedby="sportHelp" placeholder="Round">
          </div>
          <button type="submit" class="btn addBtn">Submit</button>
        
    </form>

</div>

@endsection