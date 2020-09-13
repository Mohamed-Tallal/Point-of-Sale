@extends('Dashboard.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-3">
                    <div class="col-sm-8 ">
                        <div class="card" >
                           <div id="print-order">
                               <table class="table table-hover">
                                   <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">@lang('site.Product')</th>
                                       <th scope="col">@lang('site.Price')</th>
                                       <th scope="col">@lang('site.Quantity')</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($orders as $index =>$order)
                                       <tr class="ml-2">
                                           <th scope="col">{{$index+1}}</th>
                                           <th scope="col">{{$order->name}}</th>
                                           <th scope="col">{{$order->salesPrice}}</th>
                                           <th scope="col">{{$order->pivot->quantity}}</th>
                                       </tr>
                                   @endforeach

                                   </tbody>
                               </table>
                               <span class="total-price ml-2" style="font-size: 20px; ">@lang('site.Total Price') : {{$totalPrice}} </span>
                           </div>
                            <button class="btn btn-primary btn-sm m-4 print"> @lang('site.Print Order') </button>

                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
