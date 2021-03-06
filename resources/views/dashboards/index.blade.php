@extends('layouts.dashboard')

@section('page_heading')
Dashboard
@stop

@section('page_title_buttons')

@stop

@section('section')

<div class="container">
  <div class="row">
    <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="overflow:hidden">
                        <h4>Total Artigos em Stock</h4>
                        <div class="revenue-div in-bold pull-right font-big text-danger">{{ $StockTotalValue }}</div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="row" style="margin-top:20px;">
      <div class="col-sm-5  col-xs-12 thumbnail" style="margin-top: 20px;">
        <h4 class="text-center ">
              Artigos por Tipo de peça
        </h4>
        <canvas id="PieChart" style=""></canvas>
        <div id="js-legend-pie_PieChart" class="chart-legend"></div>
      </div>
      <div class="col-sm-5 col-sm-offset-1 col-xs-12 thumbnail" style="margin-top: 20px;">
        <h4 class="text-center ">
              Artigos por marca
        </h4>
        <canvas id="PieChart2" style=""></canvas>
        <div id="js-legend-pie_PieChart2" class="chart-legend"></div>
      </div>
  </div>

  <div class="row">
    <div class="col-sm-5 col-xs-12 thumbnail" style="margin-top: 40px;">
      <h4 class="text-center ">
            Top 10 Artigos em Stock
      </h4>
      <canvas id="BarChart"></canvas>
      <div id="js-legend-bar_BarChart" class="chart-legend"></div>
    </div>
    <div class="col-sm-5 col-sm-offset-1 col-xs-12 thumbnail" style="margin-top: 40px;">
      <h4 class="text-center ">
            Artigos criados em {{ date("Y") }}
      </h4>
      <canvas id="LineChart" style="width:50%;"></canvas>
      <div id="js-legend-line_LineChart" class="chart-legend"></div>
    </div>
  </div>
</div>

{!! app()->chartpiedoughnut->render(  "PieChart",     $dataPartTypes,          ['type' => 'Doughnut'])     !!}
{!! app()->chartpiedoughnut->render(  "PieChart2",    $data_Articles_By_Brand,          ['type' => 'Pie'])          !!}
{!! app()->chartbar->render(          "BarChart",
                                      $data_series,
                                      [ 'legends' => ['Preço (€)'] ],
                                      "scaleBeginAtZero: false,
                                       scaleLabel: function (valuePayload) {
                                                      return Number(valuePayload.value).toFixed(0).replace('.',',') + ' €';
                                                  },"
                            ) !!}
{!! app()->chartline->render(         "LineChart",    $articlesByYear_dataseries,   ['legends' => ['Artigos criados']]) !!}
@stop
