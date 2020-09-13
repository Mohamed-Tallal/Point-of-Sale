@extends('Dashboard.app')

@section('content')
@php

    $models = ['users','categories','products','clients','orders'];
    $permission = ['Read','Create','Update','Delete'];
@endphp
<section class="content">
          <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">@lang('site.Add New Admin')</h5>
                                    <div class="card-body">
                                            <form method="post" action="{{route('admin.store')}}">
                                                     @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.first_name')</label>
                                                        <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                       @error('first_name')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.last_name')</label>
                                                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        @error('last_name')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.email')</label>
                                                        <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        @error('email')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">@lang('site.password')</label>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                                        @error('password')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">@lang('site.confirm')</label>
                                                        <input type="password" name="confirm" class="form-control" id="exampleInputPassword1">
                                                        @error('confirm')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                         <label>@lang('site.permission')</label>
                                                         <div class="row mt-4">
                                                        <nav class="w-100">
                                                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                                @foreach($models as $index=>$model)
                                                                    <a class="nav-item nav-link {{$index == 0 ? 'active': ''}}" id="{{$model.'-tab'}}" data-toggle="tab" href="{{'#'.$model}}" role="tab" aria-controls="{{$model}}" aria-selected="true">{{$model}}</a>
                                                                @endforeach
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content p-3" id="nav-tabContent">
                                                            @foreach($models as $index=>$model)
                                                            <div class="tab-pane fade {{$index == 0 ? 'active show': ''}}" id="{{$model}}" role="tabpanel" aria-labelledby="{$model}}-desc-tab">
                                                                <div class="row">
                                                                        @foreach($permission as $per)
                                                                        <div class="col-md-3">
                                                                            <div class="form-group form-check">
                                                                                <input type="checkbox" name="permissions[]" value="{{$model}}-{{$per}}" class="form-check-input">
                                                                                <label class="form-check-label">{{$per}}</label>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                                            </form>
                                    </div>
                            </div>
                        </div>
            </div><!-- /.row -->
          </div><!-- /.container -->
    </section>
@endsection
