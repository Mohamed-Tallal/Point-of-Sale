@extends('Dashboard.app')
@section('content')
<section class="content">
      <div class="container-fluid">
                <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">@lang('site.Loading Order')</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if($orders->count() >0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>@lang('site.ID')</th>
                                    <th>@lang('site.Client Name')</th>
                                    <th>@lang('site.Total Price')</th>
                                    <th>@lang('site.Statues Order')</th>
                                    <th>@lang('site.Created at')</th>
                                    <th>@lang('site.Control')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $index=>$order)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$order->clients->name}}</td>
                                        <td>{{$order->totalPrice}}</td>
                                        <td>{{$order->statues}}</td>
                                        <td>{{$order->created_at}}</td>

                                        <td>
                                            <form action="{{route('order.update',$order->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                {{method_field('put')}}

                                                <a href="{{route('Client.Order.checkOut',$order->id )}}" class="btn btn-primary btn-sm "><i class="fas fa-eye"></i>&nbsp;&nbsp;@lang('site.See Product')</a>
                                                @if(auth()->user()->hasPermission('orders-update'))

                                                <button type="submit" class="btn btn-primary btn-sm "><i class="fas fa-check-double"></i>&nbsp;@lang('site.Prepared') </button>
                                                @else
                                                    <button type="submit" class="btn btn-primary btn-sm disabled"><i class="fas fa-check-double"></i>&nbsp;@lang('site.Prepared') </button>

                                                @endif
                                            </form>
                                            @if(auth()->user()->hasPermission('orders-delete'))
                                                <form method="post" action="{{route('order.destroy',$order->id)}}" style="display:inline-block">
                                                    {{csrf_field()}}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp;@lang('site.Delete')</button>
                                                </form>
                                            @else
                                                <button class="btn btn-danger disabled btn-sm"><i class="far fa-trash-alt"></i>&nbsp;@lang('site.Delete')</button>
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
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                    <!-- /.card-body -->

                    </div>
                            <!-- /.card-body -->
                </div>

                </div>
 </div>
</section>
@endsection
