@extends('Dashboard.app')
@section('content')
<section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3>{{$clients}}</h3>

                          <p>Client</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{route('client.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3>{{$admins}}</h3>

                          <p>Admin</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3>{{$product}}</h3>

                          <p>Product</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3>{{$category}}</h3>

                          <p>Category</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
      </div>
        <div class="box box-solid">

            <div class="box-header">
                <h3 class="box-title">Sales Graph</h3>
            </div>
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
</section>

@endsection
@push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                    @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
