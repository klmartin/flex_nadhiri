@extends('layouts.index')

@section('center')
<body>
 <div class="content-wrapper">
   
<!-- Small boxes (Stat box) -->
 <div class="container-fluid">
        <div class="row">
      
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$pymnttotal}}</h3>

                <p>TOTAL PAYMENTS</p>
              </div>
              <div class="icon">
                <span class="iconify" data-icon="ic:outline-account-balance-wallet" data-inline="false"></span>
              </div>
              <a href="#" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{$paymonth}} </h3>

                <p>NET PAYMENTS / MONTH</p>
              </div>
              <div class="icon">
                 <span class="iconify" data-icon="emojione-monotone:money-bag" data-inline="false"></span>

              </div>
              <a href="/manage-payments" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totalpledge}}</h3>

                <p>TOTAL PLEDGES</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/view-pledges" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              
                <h3>{{ $users }}</h3>
   

                <p>TOTAL MEMBERS</p>
              </div>
              <div class="icon">
               <span class="iconify" data-icon="bi:people-fill" data-inline="false"></span>
              </div>
              <a href="/manage-members" class="small-box-footer">View All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
        </div>
        <!-- /.row -->
    <!-- chart card-->
   <div class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- MEMBERS CHART -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Members</h3>
                  <a href="/manage-members">View All</a>
                  <a href="#"> <span class="iconify" data-icon="bx:bxs-file-pdf" data-inline="false"></span> </a>
                </div>
              </div>
              <div  id="users-chart" class="card-body">
                
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="users-chart" height="200"></canvas>
                </div>

                
              </div>
            </div>
          </div>

          <!-- END OF MEMBERS CHART -->

          <!--pAYMENTS CHART -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Payments</h3>
                  <a href="/manage-payments">View All</a>
                  <a href="#"> <span class="iconify" data-icon="bx:bxs-file-pdf" data-inline="false"></span> </a>
                </div>
              </div>
              <div  id="pays-chart" class="card-body">
              </div>
            </div>
          </div>
          <!-- end of PAYMENTS CHART-->


</div>
<!-- Card -->

<div id="chart-container" class="col-lg-4 col-md-6 col-12"></div>
</body>

<script src="{{asset('js/highcharts.js')}}"></script>

<script type="text/javascript">
    var datas = <?php echo json_encode($datas)?>;

    Highcharts.chart('users-chart', {
        title: {
            text: 'New Member Growth, 2020'
        },
        subtitle: {
            text: 'Waumini Wapya'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Members'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Members',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>

<!-- start of payments chart script -->
<script type="text/javascript">
    var datap = <?php echo json_encode($datap)?>;

    Highcharts.chart('pays-chart', {
        chart:{
      
          type: 'line'
        },
        title: {
            text: 'Payments Chart , 2020'
        },
        subtitle: {
            text: 'Change in Payment'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Payments'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Payments',
            data: datap
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
<!-- end of payments chart script -->



@endsection