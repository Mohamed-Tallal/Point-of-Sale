@extends('Dashboard.app')

@section('content')

<section class="content">
          <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">@lang('site.Add New Category')</h5>

                                    <div class="card-body">
                                            <form method="post" action="{{route('category.store')}}">
                                                     @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.name')</label>
                                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                       @error('name')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
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
