@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Meu Dashboard</li>
        </ol>

        <h2><strong>{{date('d-m-Y')}}</strong></h2> 
		    <div><h2><strong id="time"></strong></h2> </div>
        <!-- Icon Cards-->
        <h3>Geral</h3>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-hourglass-end"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$sells->count()}} Pedidos em Curso</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="">
                        <span class="float-left"></span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-check-circle"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$sellsfinal->count()}} Pedidos Finalizados</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{URL::to('sells-final-admin')}}">
                        <span class="float-left">Ver Detalhes</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$product->count()}} Produtos</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('products.index')}}">
                        <span class="float-left">Ver Detalhes</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-heart"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$category->count()}} Categorias</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('categories.index')}}">
                        <span class="float-left">Ver Detalhes</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-map-o"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$local->count()}} Locais de Entrega</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('locals.index')}}">
                        <span class="float-left">Ver Detalhes</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card dashboard text-white bg-danger o-hidden h-100">
                  <div class="card-body">
                      <div class="card-body-icon">
                          <i class="fa fa-fw fa-user"></i>
                      </div>
                      <div class="mr-5">
                          <h5>{{count(\App\Models\User::get())}} Usuários Cadastrados</h5>
                      </div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="{{route('locals.index')}}">
                      <span class="float-left">Ver Detalhes</span>
                      <span class="float-right">
                          <i class="fa fa-angle-right"></i>
                      </span>
                  </a>
              </div>
          </div>
        </div>

        <hr>
       
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-usd"></i>
                    </div>
                    <div class="mr-5">
                        <h5>Vendas este mês: {{$sum_month_sell}} MT</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="">
                    <span class="float-left"></span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-primary o-hidden h-100">
              <div class="card-body">
                  <div class="card-body-icon">
                      <i class="fa fa-fw fa-usd"></i>
                  </div>
                  <div class="mr-5">
                      <h5>Vendas total: {{$sum_total_sell}} MT</h5>
                  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="">
                  <span class="float-left"></span>
                  <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                  </span>
              </a>
          </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-superpowers"></i>
                </div>
                <div class="mr-5">
                    <h5>PRATO DO DIA</h5>
                    <p>@if ($dish_day !=null)
                        {{$dish_day->name}}
                    @else
                        Não foi definido
                    @endif</p>
                </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('products.index')}}">
                <span class="float-left">Ir ao produtos</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
        </div>
        <!-- /cards -->
        <h2></h2>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <i class="fa fa-bar-chart"></i>Estatísticas de Vendas Diária
            </div>
            <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <!-- Example Bar Chart Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i>Estatísticas de Vendas Mensal </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100" height="50"></canvas>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4">
              <!-- Example Bar Chart Card-->
              <div class="card mb-3">
                  <div class="card-header">
                      <i class="fa fa-bar-chart"></i>Últimas vendas</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered"  width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Nome</th>
                                  <th>Vendas</th>
                                  
                                  
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                <th>Cliente</th>
                                <th>Vendas</th>
                              </tr>
                          </tfoot>
                          <tbody>
                           

                             @foreach ($last_sell as $item)
                              <tr>
                                  <td>{{$item->user->name}}</td>
                                  <td>{{$item->total}} MT</td>
                                 
                                 
                              </tr>
                             
                              @endforeach
                          
                          </tbody>
                      </table>
                  </div>
                  </div>
                 
              </div>
          </div>
            
        </div>
    </div>
    <!-- /.container-fluid-->
</div>
<script>
  // Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// -- Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31",],
    datasets: [{
      label: "Vendas",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,
      data: [<?php echo $graphicBar_Daily ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 30
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 50,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
    datasets: [{
      label: "Vendas",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php echo $graphicBar_Monthly ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 50,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});


</script>

@endsection