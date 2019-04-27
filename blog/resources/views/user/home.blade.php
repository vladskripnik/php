@extends('layouts.app')

@section('content')
@foreach($users as $user)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard {{$user->name }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="panel-body">         
                          <table class="table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Avatars</th>
                                <th>Name</th>
                                <th>Email</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>{{$user->id }}</th>
                                <th>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
                                  </a>
                                </th>
                                <th>{{$user->name }}</th>
                                <th>{{$user->email }}</th>
                                @if (Auth::user()->group_id == '3')
                                <th>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size:20px;">
                                        &#9998; <span class="user_img"></span>
                                    </a>
                                   <ul class="dropdown-menu">
                                                 <li class="dropdown">
                                                        <a href="/update/{{ $user->id }}">
                                                            Update
                                                        </a>
                                                </li>
                                                <li class="dropdown">
                                                    <form action="/user/{{ $user->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit" value="DELETE" style="margin-left: 20px;">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                </li>
                                    </ul>
                                 </div>   
                                 @endif           
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
