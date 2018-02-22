@extends('layouts.manage')

@section('content')
<div class="flex-container">
<div class="columns m-t-10">
  <div class="column">
    <h1 class="title">Edit  User</h1>
  </div>
</div>
<hr class="m-t-0">
<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    {{method_field('PUT')}}
   
<div class="columns">
  <div class="column">
      <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="name" value="{{$user->name}}" placeholder="user name">
        </div>
      </div>
      <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
          <input class="input" name="email" type="email" placeholder="user email" value="{{$user->email}}">
        </div>
      </div>
      <div class="field">
        <label class="label" for="password">Password</label>
        <div class="block">
            <div class="field">
                <b-radio name="password_options" native-value="keep" v-model="password_options">
                Do Not Change Password</b-radio>
            </div>
            <div class="field">
                <b-radio name="password_options" native-value="auto" v-model="password_options">
                Auto-Generate New Password</b-radio>
            </div>
            <div class="field">
                <b-radio native-value="manual" name="password_options" v-model="password_options">
                Manually Set New Password</b-radio>
                <div class="control">
                    <input class="input" name="password" type="password" id="password" v-if="password_options == 'manual'" placeholder="Your password">
                </div>
            </div>
        </div>
        
      </div>
      <button class="button is-success">Update User</button>
    
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
        password_options: 'keep'
      }
    });
  </script>
@endsection
