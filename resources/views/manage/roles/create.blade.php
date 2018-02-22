@extends('layouts.manage')
 
 @section('content')
   <div class="flex-container">
     <div class="columns m-t-10">
       <div class="column">
       <h1 class="title">Create New Role</h1>
       </div> <!-- end of column -->
 
       <div class="column">
         <!--<a href="" class="button is-primary is-pulled-right"><i class="fa fa-edit m-r-10"></i> Create Role</a>-->
       </div>
     </div>
     <hr class="m-t-0">
 
     <form method="POST" action="{{route('roles.store')}}">
        @csrf
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
                                    <input type="text" name="display_name" id="display_name" class="input" value="{{old('display_name')}}">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="name" class="label">Slug</label>
                                        <input type="text" name="name" id="name" class="input" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label for="description" class="label">Description</label>
                                        <input type="text" name="description" value="{{old('description')}}" id="description" class="input">
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
                <button class="button is-primary">Save</button>
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
                permissionSelected: []
            }
        })
    </script>
@endsection