@extends('layouts.skeleton')
@section('content')

<div class="mt-4">
    <h1 style="color: #332D2D;">Create Competition</h1>

    <form method="POST" action="/competitions">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-muted">Your competition will be available by this name.</small>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input name="date" type="date" class="form-control" id="date" placeholder="Enter date">
          </div>
          <div class="form-group">
            <label for="sport">Sport</label>
            <input name="sport" type="text" class="form-control" id="sport" aria-describedby="sportHelp" placeholder="Sport">
          </div>
          <div class="form-group">
            <label for="prize">Prize</label>
            <input name="prize" type="number" class="form-control" id="prize" aria-describedby="prizeHelp" placeholder="Prize ($)">
          </div>
          <button type="submit" class="btn addBtn">Submit</button>
        
    </form>

</div>

@endsection