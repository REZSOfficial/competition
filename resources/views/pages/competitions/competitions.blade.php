@extends('layouts.skeleton')
@section('content')
<div class="mt-4">
<h1 style="color: #332D2D !important">Competitions</h1>
@if(count($competitions) >= 1)
<table class="table comp-table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Sport</th>
        <th scope="col">Prize</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($competitions as $competition)
        <tr>
            <th  scope="row"><a style="color: #C4AF9A !important" onclick="routeToCompetitionInfo($competition->id)" href="/competitions/{{$competition->id}}">{{$competition->name}}</a></th>
            <td>{{$competition->date}}</td>
            <td>{{$competition->sport}}</td>
            <td>{{$competition->prize}}$</td>
          </tr>
        @endforeach  
    </tbody>
  </table>
  @else
<h1>No competitions in database</h1>
@endif
<button class="btn addBtn"><a class="addBtn" onclick="routeToCreate()">Create Competition</a></button>
</div>
@if (session('message'))
  <div class="alert">{{ session('message') }}</div>
@endif

@endsection
