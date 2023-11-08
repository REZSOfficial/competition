@extends('layouts.skeleton')
@section('content')

<div class="mt-4">
<h1 style="color: #332D2D">Rounds</h1>
@if(count($data['rounds']) >= 1)
<table class="table table-dark comp-table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Competition</th>
        <th scope="col">Round</th>
        <th scope="col">Add Round</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data['rounds'] as $round)
        <tr>
            <td >{{$round->competition_name}}</td>
            <td>
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$round->round}}
                </button>
                <div class="competitors-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($data['competitors'] as $competitor)
                        @if($competitor->round_competition_round == $round->round)
                        <p class="competitor-item dropdown-item mb-0">{{$competitor->user_firstname}} {{$competitor->user_lastname}}</p>
                        @endif
                    @endforeach
                    <hr color="#C4AF9A" class="my-4">
                    <p><a class="mx-3 competitor-item" href="/competitions/{{$data['competition']->id}}/{{$round->round}}/add">Add Competitor</a></p>
                </div>
              </div>
            </td>
            <td><button class="btn addBtn"><a class="addBtn hover" href="/competitions/{{$data['competition']->id}}/createround">Add Round</a></button></td>
          </tr>
        @endforeach
    </tbody>
  </table>
  @if (session('message'))
  <div class="alert">{{ session('message') }}</div>
@endif
@if (session('error'))
  <div class="alert">{{ session('error') }}</div>
@endif
  @else
<h1>No rounds in competition</h1>
<td><button class="btn addBtn"><a class="addBtn" href="/competitions/{{$data['competition']->id}}/createround">Add Round</a></button></td>
@endif
</div>
@endsection
