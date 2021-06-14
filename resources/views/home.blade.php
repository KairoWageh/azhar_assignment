@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can('user-create')
            <button type="button" class="btn btn-primary add_user_btn" data-toggle="modal">
                <i class="fa fa-plus"></i> {{__('user')}}
            </button>
            @endcan
            <div class="card">
                <!-- add user madal start -->
                <div class="modal fade" id="add_user_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">{{__('add_user')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="validation-errors"></div>
                            <form id="add_user" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name_en">{{__('name')}}</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="{{__('name')}}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('email')}}</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="{{__('email')}}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{__('password')}}</label>
                                        <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="password" placeholder="{{__('password')}}">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">{{__('password_confirmation')}}</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="{{__('password_confirmation')}}">
                                        @error('password_confirmation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{__('role')}}</label>
                                        <select name="role" class="form-control @error('admin_role') is-invalid @enderror">
                                            <option value="">....</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                            @endforeach
                                        </select>

                                        @error('admin_role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('add')}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- add user modal end -->

                <!-- Edit user modal start -->
                <div class="modal fade" id="edit_user_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">{{__('edit_user')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class ="validation-errors"></div>
                            <form id="edit_user_form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" class="form-control user_id_to_edit" id="user_id" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_name">{{__('name')}}</label>
                                        <input type="text" name="edit_name" class="form-control @error('edit_name') is-invalid @enderror" id="edit_name" placeholder="{{__('name')}}">
                                        @error('edit_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="edit_email">{{__('email')}}</label>
                                        <input type="email" name="edit_email" class="form-control" id="edit_email" placeholder="{{__('email')}}">
                                        @error('edit_email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('edit')}}</button>
                                </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- Edit user modal end -->

                <!-- Delete user modal start -->
                <div id="delete_user_modal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header flex-column">
                                <h4 class="modal-title w-100">{{__('are_you_sure')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>{{__('confirm')}}</p>
                                <form>
                                {{ csrf_field() }}
                                <!-- {{ method_field('DELETE') }} -->
                                    <input type="hidden" name="user_id_to_delete" class="user_id_to_delete">
                                </form>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('cancel')}}</button>
                                <button type="button" class="btn btn-danger delete_user_confirm">{{__('delete')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete user modal end -->
                <div class="card-header">{{ __('dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table" id="users_table">
                            <thead>
                            <tr>
                                <th scope="col">{{__('name')}}</th>
                                <th scope="col">{{__('email')}}</th>
                                <th scope="col">{{__('role')}}</th>
                                @canany(['user-edit', 'user-delete'])
                                <th scope="col">{{__('control')}}</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr id="{{$user->id}}">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('name')[0] }}</td>
                                        <td>
                                            @if($user->roles->pluck('name')[0] != 'SuperAdmin')
                                            @can('user-edit')
                                                <button type="button" class="btn btn-info edit_user" data-toggle="modal"  name="edit_user" data-id="{{ $user->id }}">
                                                    <i class="fa fa-edit" style="color: #fff"></i>
                                                </button>
                                            @endcan
                                            @endif
                                            @can('user-delete')
                                                @if($user->id !== Auth::user()->id)
                                                    <button type="button" class="btn btn-danger delete_user" data-toggle="modal"  name="delete_user" data-id="{{ $user->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    function show_add_form(){
        $('#add_user_modal').modal('show');
    }
    function edit_user(user_id){
        var url = "{{url('user/:user/edit')}}";
        url = url.replace(':user', user_id);
        $.ajax({
            url: url,
            type:"GET",
            data: {user_id: user_id},
            contentType: 'application/json; charset=utf-8',
            //dataType: 'json',
            success:function(response){
                $('#user_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_email').val(response.email);

                // show edit user modal
                $('#edit_user_modal').modal('show');
            }, error: function(xhr, status, error){
                var errorMessage = xhr.status + ': ' + xhr.statusText
                console.log('Error - ' + errorMessage);
            }
        });
    }

    function delete_user(user_id){
        $('#delete_user_modal').modal('show');
        $(".user_id_to_delete").attr("value", user_id);
    }

    function delete_user_confirm(user_id){

        var url = "{{url('user/:user')}}";
        url = url.replace(':user', user_id);
        //let formData = new FormData(this);
        $.ajax({
            url: url,
            type: "DELETE",
            data: {"_token": "{{ csrf_token() }}"},
            success:function(response){
                if(response.toast == 'success'){
                    toastr.success(response.message);
                }else if(response.toast == 'error'){
                    toastr.error(response.message);
                }
                $('#delete_user_modal').modal('hide');
                $('table#users_table tr#'+user_id).remove();
            },
        });
    }

    $(document).ready(function (){
        var users_table = $('#users_table');
        $('.add_user_btn').click(function(){
            show_add_form();
        });
        $('#add_user').on('submit',function(event){
            event.preventDefault();
            // get form submitted data
            let formData = new FormData(this);
            $.ajax({
                url: "user",
                type:"POST",
                data: formData,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response.user){
                        users_table.append('<tr id ="'+response.user.id+'">'+
                            '<td>'+response.user.name+'</td>'+
                            '<td>'+response.user.email+'</td>'+
                            '<td>'+response.user.role+'</td>'+
                        '<td class="actions_'+response.user.id+'">'
                        );
                        var edit_btn = $('<button/>')
                            .attr('data-id', response.user.id)
                            .addClass('btn btn-info edit_user')
                            .attr('onclick', 'edit_user('+response.user.id+')')
                            .attr('type', 'button')
                            .html('<i class="fa fa-edit" style="color: #fff"></i>');
                        $('.actions_'+response.user.id).append(edit_btn);
                        var delete_btn = $('<button/>')
                            .attr('data-id', response.user.id)
                            .addClass('btn btn-danger delete_user')
                            .attr('onclick', 'delete_user('+response.user.id+')')
                            .attr('type', 'button')
                            .html('<i class="fa fa-trash"></i>');;
                        $('.actions_'+response.user.id).append(delete_btn);
                        toastr.success(response.message);
                        $('#add_user_modal').modal('hide');
                        document.getElementById('add_user').reset();
                    }else{
                        toastr.error(response.message);
                    }
                },
                error: function (xhr) {
                    $('.validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.validation-errors').append('<p style="color: red">'+value+'</p');
                    });
                },
            });
        });
       $('.edit_user').click(function (){
           $('.validation-errors').html('');
           var user_id = parseInt($(this).attr("data-id"));
           edit_user(user_id);
       });
        // edit user form submition
        $('#edit_user_form').on('submit',function(event){
            event.preventDefault();

            // get form submitted data
            var user_id = $(".user_id_to_edit").attr("value");
            let formData = new FormData(this);

            var url = "{{url('user/:user_id')}}";
            url = url.replace(":user_id", user_id);

            $.ajax({
                url: url,
                type:"POST",
                data: formData,
                contentType: false,
                processData: false,
                success:function(response){
                    // if(response.data.product){
                    //     toastr.success(response.data.message);
                        $('#edit_user_modal').modal('hide');
                        // get tr by id and refresh
                        $('#users_table').find('tr').each(function(){
                            if($(this).attr('id') == user_id){
                                // $(this).remove();
                                $(this).find('td').each (function(index, tr) {
                                    if(index == 0){
                                        $(this).html(response.name);
                                    }
                                    if(index == 1){
                                        $(this).html(response.email);
                                    }
                                });
                            }
                        });
                    // }else{
                    //     toastr.error(response.data.message);
                    // }

                },
                error: function (xhr) {
                    $('.validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.validation-errors').append('<p style="color: red">'+value+'</p');
                    });
                },
            });
        });

        // delete user
        $('.delete_user').click(function(){
            var user_id = parseInt($(this).attr("data-id"));
            delete_user(user_id);
        });
        $('.delete_user_confirm').click(function(){
            var user_id = $(".user_id_to_delete").attr("value");
            delete_user_confirm(user_id);
        });
    });
</script>
@endpush
