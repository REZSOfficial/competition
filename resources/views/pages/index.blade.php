@extends('layouts.skeleton')
@section('content')

<div id="content">
<div id="jumbotron" style="color: #C4AF9A" class="jumbotron mt-4 bg-dark">
    <h1 class="display-4">Competitions</h1>
    <p class="lead">In this application you can create and manage competitions and competitors.</p>
    <hr color="#C4AF9A" class="my-4">
    <p>You can view existing competitions or create a new one.</p>
    <p class="lead">
      <a class="btn btn-success btn-lg text-light mb-1 jumbotron-buttons" onclick="routeToCompetitions()" role="button">View competitions</a>
      <a class="btn btn-success btn-lg text-light mb-1 jumbotron-buttons" onclick="routeToCreate()" role="button">Create a competition</a>
    </p>
  </div>
</div>


@endsection