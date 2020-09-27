@extends('Dashboard.app')
@section('content')
<section class="content">
      <div class="container-fluid">

            <form action="{{route('client.index')}}" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 w-50"  type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> &nbsp;@lang('site.Search')</button>
                 @if(auth()->user()->hasPermission('clients-create'))
                   <a href="{{route('client.create')}}" class="btn btn-primary ml-3"><i class="fas fa-plus"></i>&nbsp; @lang('site.Add Client')</a>

                 @else
                     <button class="btn btn-primary disabled ml-3"><i class="fas fa-plus"></i>&nbsp;@lang('site.Add Client')</button>
                 @endif
                </form>

                <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">@lang('site.Show All Clients')</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if($clients->count() >0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('site.ID')</th>
                                    <th>@lang('site.Name')</th>
                                    <th>@lang('site.Phone')</th>
                                    <th>@lang('site.Address')</th>
                                    <th>@lang('site.Add Order')</th>
                                    <th>@lang('site.Control')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $index=>$client)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->phone}}</td>
                                        <td>{{$client->address}}</td>
                                        <td>
                                            @if(auth()->user()->hasPermission('orders-create'))
                                                <a href="{{route('Client.Order',$client->id)}}" class="btn btn-info btn-sm" > @lang('site.Add Order')</a></td>
                                        @else
                                            <a href="" class="btn btn-info btn-sm disabled" > @lang('site.Add Order')</a></td>

                                        @endif
                                        <td>
                                            @if(auth()->user()->hasPermission('products-read'))
                                                <a href="{{route('client.edit',$client->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> &nbsp; @lang('site.Update')</a>
                                            @else
                                                <button  class="btn btn-info disabled btn-sm" ><i class="fas fa-pen"></i> &nbsp;@lang('site.Update')</button>
                                            @endif
                                            @if(auth()->user()->hasPermission('clients-delete'))
                                                <form method="post" action="{{route('client.destroy',$client->id)}}" style="display:inline-block">
                                                    {{csrf_field()}}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp; @lang('site.Delete')</button>
                                                </form>
                                            @else
                                                <button class="btn btn-danger disabled btn-sm"><i class="far fa-trash-alt"></i>&nbsp; @lang('site.Delete')</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                            <h2> @lang('site.Not Found Record')</h2>
                        @endif
                        <br>
                        {{ $clients->appends(request()->query())->links() }}

                    </div>
                    <!-- /.card-body -->

                    </div>
                            <!-- /.card-body -->
                </div>
     </div>
 </div>
</section>
@endsection
