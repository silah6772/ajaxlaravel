@extends('layouts.ap')
@section('content')


<div class="row">
    <div class="col-md-12">
        <h2>SIMPLE LARAVEL CRUD AJAX</h2>
    </div>
</div>
<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered " id="table">
            <tr>
                <th width="150px"No></th>
                <th>Title</th>
                <th>Body</th>
                <th>Create At</th>
                <th class="text-center" width="150px">
                    <a href="#" class="create-modal btn btn-success btn-sm">
                        <i class="glyphicon glyphicon-plus"></i></a></th>
            </tr>
            {{csrf_field()}}
            <?php $no=1;?>
            @foreach($post as $key =>$value)
                <tr class="post{{$value->id}}">
                    <td>{{$no++}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{$value->body}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <a href="#" class="show-modal btn btn-info btn-sm" data_id="{{$value->id}}" data_title="{{$value->title}}" data_body="{{$value->body}}"><i class="fa fa-eye"></i> </a>
                        <a href="#" class="edit-modal btn btn-warning btn-sm" data_id="{{$value->id}}" data_title="{{$value->title}}" data_body="{{$value->body}}"><i class="glyphicon glyphicon-pencil"></i> </a>
                        <a href="#" class="delete-modal btn btn-danger btn-sm" data_id="{{$value->id}}" data_title="{{$value->title}}" data_body="{{$value->body}}"><i class="glyphicon glyphicon-trash"></i> </a>
                    </td>
                </tr>                    @endforeach

        </table>
    </div>
</div>
{{-- creating a new modal--}}
    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row-add">
                            <label class="control-label col-sm-2" for="title">Title:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="your title here" required>
                            <p class="error text-center alet alert-danger hidden"></p>

                        </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-2" for="body">Body:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="body" name="bosy" placeholder="your body here" required>
                                <p class="error text-center alet alert-danger hidden"></p>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit" id="add">
                        <span class="glyphicon glyphicon-plus"></span> Save Post
                    </button>
                    <button class="btn btn-warning" type="button" data-dismiss="modal">
                        <span class="glyphicon remove"></span> close
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection