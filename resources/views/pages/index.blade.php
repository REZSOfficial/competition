@extends('layouts.skeleton')

@section('content')

<div style="color: #C4AF9A" class="jumbotron mt-4 bg-dark">
    <h1 class="display-4">Competitions</h1>
    <p class="lead">In this application you can create and manage competitions and competitors.</p>
    <hr color="#C4AF9A" class="my-4">
    <p>You can view existing competitions or create a new one.</p>
    <p class="lead">
      <a style="background-color: #C4AF9A !important; color: black !important" class="btn btn-success btn-lg text-light mb-1" href="/competitions" role="button">View competitions</a>
      <a style="background-color: #C4AF9A !important; color: black !important" class="btn btn-success btn-lg text-light mb-1" href="/competitions/create" role="button">Create a competition</a>
    </p>
  </div>

@endsection