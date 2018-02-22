@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Create New Permission</h1>
        </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
        <div class="column">
            <form action="{{route('permissions.store')}}" method="POST">
                @csrf
                <div class="block">
                    <div class="field">
                        <b-radio name="permission_type" native-value="basic" v-model="permissionType">
                        Basic Permission</b-radio>
                    </div>
                    <div class="field">
                        <b-radio name="permission_type" native-value="crud" v-model="permissionType">
                        CRUD Permission</b-radio>
                    </div>
                </div>
                <div class="field" v-if="permissionType == 'basic'">
                    <label class="label" for="display_name">Name (Display Name)</label>
                    <div class="control">
                        <input class="input" name="display_name" type="text" id="display_name">
                    </div>
                </div>
                <div class="field" v-if="permissionType == 'basic'">
                    <label class="label" for="name">Slug</label>
                    <div class="control">
                        <input class="input" name="name" type="text" id="name">
                    </div>
                </div>
                <div class="field" v-if="permissionType == 'basic'">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <input class="input" name="description" type="text" id="description">
                    </div>
                </div>
                <div class="field" v-if="permissionType == 'crud'">
                    <label class="label" for="resource">Resource</label>
                    <div class="control">
                        <input class="input" name="resource" type="text" id="resource" v-model="resource">
                    </div>
                </div>
                <div class="columns" v-if="permissionType== 'crud'">
                    <div class="column">
                        <div class="block">
                            <b-checkbox v-model="crudSelected"
                                native-value="create">
                                Create
                            </b-checkbox>
                            <b-checkbox v-model="crudSelected"
                                native-value="read">
                                Read
                            </b-checkbox>
                            <b-checkbox v-model="crudSelected"
                                native-value="update">
                                Update
                            </b-checkbox>
                            <b-checkbox v-model="crudSelected"
                                native-value="delete">
                                Delete
                            </b-checkbox>
                        </div>
                    </div>
                    <input type="hidden" name="crud_selected" :value="crudSelected">

                    <div class="column">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                            </thead>
                            <tbody v-if="resource.length > 3">
                                <tr v-for="item in crudSelected">
                                    <td v-text="crudName(item)"></td>
                                    <td v-text="crudSlug(item)"></td>
                                    <td v-text="crudDescription(item)"></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="button is-success">Create Permission</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionType: 'basic',
                resource: '',
                crudSelected: ['create', 'read', 'update', 'delete']
            },
            methods: {
                crudName: function(item) {
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function(item) {
                    return item.toLowerCase() + "-" + app.resource.toLowerCase();
                },
                crudDescription: function(item) {
                    return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                }
            }
        })
    </script>
@endsection