@extends('layouts.manage')

@section('content')
<div class="flex-container">
<div class="columns m-t-10">
  <div class="column">
    <h1 class="title">Create New User</h1>
  </div>
</div>
<hr class="m-t-0">
<form action="{{route('users.store')}}" method="post">
    @csrf
<div class="columns">
  <div class="column">
      <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="name" id="name" placeholder="user name">
        </div>
      </div>
      <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" id="email" placeholder="user email">
        </div>
      </div>
      <div class="field">
        <label class="label" for="password">Password</label>
        <div class="control">
          <input class="input" type="password" name="password" id="password" v-if="!auto_password" placeholder="Your password">
          <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
        </div>
      </div>
      <button type="submit" class="button is-success">Create User</button>
    
  </div>
</div>
</form>
</div>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true
      }
    });
  </script>
@endsection
