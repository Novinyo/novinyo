@extends('layouts.manage')
 
 @section('content')
   <div class="flex-container">
     <div class="columns m-t-10">
       <div class="column">
       <h1 class="title">Edit {{$role->display_name}}</h1>
       </div> <!-- end of column -->
 
       <div class="column">
         <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-edit m-r-10"></i> Edit Role</a>
       </div>
     </div>
     <hr class="m-t-0">
 
     <form method="POST" action="{{route('roles.update', $role->id)}}">
        @csrf
        {{method_field('PUT')}}
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2 class="title">Role Details:</h2>
                                <div class="field">
                                    <div class="control">
                                        <label for="display_name" class="label">Name (Custom)</label>
                                    <input type="text" name="display_name" id="display_name" class="input" value="{{$role->display_name}}">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="name" class="label">Slug (Not editable)</label>
                                        <input type="text" name="name" id="name" class="input" value="{{$role->name}}" disabled>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="description" class="label">Description</label>
                                        <input type="text" name="description" id="description" class="input" value="{{$role->description}}">
                                    </div>
                                </div>
                                <input type="hidden" :value="permissionSelected" name="permissions">
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                      <div class="media-content">
                        <div class="content">
                            <h2 class="title">Permissions</h2>
                            <div class="block">
                                @foreach($permissions as $permission)
                                    <div class="field">
                                            <b-checkbox v-model="permissionSelected" :native-value="{{$permission->id}}">
                                            {{$permission->display_name}} <em>({{$permission->description}})</em>
                                        </b-checkbox>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <button class="button is-primary">Save changes</button>
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
                permissionSelected: {!!$role->permissions->pluck('id')!!}
            }
        })
    </script>
@endsection