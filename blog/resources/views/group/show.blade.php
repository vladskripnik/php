@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="padding-bottom: 50px;">
                <div class="panel-heading">Add New Group</div>
                 <form enctype="multipart/form-data" action="{{ route('group.create') }}" method="POST">
                    <div class="input-group " style="left:100px;top:25px;">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="group">
                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input style="margin-top: 20px;position: right; " type="submit" class="pull-left btn btn-sm btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
