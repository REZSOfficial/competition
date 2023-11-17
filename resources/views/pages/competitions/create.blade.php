@extends('layouts.skeleton')
@section('content')
<div class="mt-4">
    <h1 style="color: #332D2D;">Create Competition</h1>

    <form id="createCompetitionForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
            <small id="nameHelp" class="form-text text-muted">Your competition will be available by this name.</small>

              <div id="name-error" class="alert alert-danger"></div>

          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input name="date" type="date" class="form-control" id="date" placeholder="Enter date" value="{{old('date')}}">
            <div id="date-error" class="alert alert-danger"></div>
          </div>
          <div class="form-group">
            <label for="sport">Sport</label>
            <input name="sport" type="text" class="form-control" id="sport" placeholder="Sport" value="{{old('sport')}}">
            <div id="sport-error" class="alert alert-danger"></div>
          </div>
          <div class="form-group">
            <label for="prize">Prize</label>
            <input name="prize" type="number" class="form-control" id="prize" max="999999999" placeholder="Prize ($)" value="{{old('prize')}}">
            <div id="prize-error" class="alert alert-danger"></div>
          </div>
          <button type="submit" class="btn addBtn" onclick="submitCreateCompetitionForm()">Submit</button>
          
    </form>

</div>

@endsection