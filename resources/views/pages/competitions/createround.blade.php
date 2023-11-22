<div class="mt-4">
    <h1 style="color: #332D2D;">Create Round</h1>
    <form id="createRoundForm">
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
            <input name="round" type="number" class="form-control" id="round" aria-describedby="sportHelp" placeholder="Round">
          </div>
          <input style="display: none" readonly type="number" name="competition_id" id="competition_id" value="{{$competition->id}}">
          <button type="submit" class="btn addBtn" onclick="submitCreateRoundForm()">Submit</button>
          <div id="round-error" class="alert alert-danger"></div>
    </form>

</div>