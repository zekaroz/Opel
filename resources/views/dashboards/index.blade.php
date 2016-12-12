@extends('layouts.dashboard')

@section('page_heading')
Dashboard
@stop

@section('page_title_buttons')

@stop

@section('section')

<div class="container">
  <div class="row">
      <div class="col-sm-5  col-xs-12 thumbnail" style="margin-top: 20px;">
        <div class="">
              Artigos por Tipo de peça
        </div>
        <canvas id="PieChart" style=""></canvas>
        <div id="js-legend-pie_PieChart" class="chart-legend"></div>
      </div>
      <div class="col-sm-5 col-offset-sm-2 col-xs-12 thumbnail" style="margin-top: 20px;">
        <div class="">
              Artigos por marca
        </div>
        <canvas id="PieChart2" style=""></canvas>
        <div id="js-legend-pie_PieChart2" class="chart-legend"></div>
      </div>
  </div>

  <div class="row">
    <div class="col-sm-5 col-xs-12 thumbnail" style="margin-top: 40px;">
      <canvas id="BarChart"></canvas>
      <div id="js-legend-bar_BarChart" class="chart-legend"></div>
    </div>
    <div class="col-sm-5 col-xs-12 thumbnail" style="margin-top: 40px;">
      <canvas id="LineChart" style="width:50%;"></canvas>
      <div id="js-legend-line_LineChart" class="chart-legend"></div>
    </div>
  </div>
</div>

{!! app()->chartpiedoughnut->render(  "PieChart",     $dataPartTypes,          ['type' => 'Doughnut'])     !!}
{!! app()->chartpiedoughnut->render(  "PieChart2",    $data,          ['type' => 'Pie'])          !!}
{!! app()->chartbar->render(          "BarChart",     $data_series,   ['legends' => ['Artigos'], 'whatever' => ['whatever'] ]) !!}
{!! app()->chartline->render(         "LineChart",    $data_series,   ['legends' => ['Artigos']]) !!}
@stop
