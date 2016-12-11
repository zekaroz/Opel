@extends('layouts.dashboard')

@section('page_heading')
Dashboard
@stop

@section('page_title_buttons')

@stop

@section('section')
<?php
    $data = array(
        'Jan' => array(33),
        'Feb' => array(32),
        'Mar' => array(12)
    );

    $data2 = array(
        'Jan' => array(33),
        'Feb' => array(32),
        'Março' => array(12)
    );
?>

<div class="container-fluid">1
    <canvas id="BarChart" style="width:50%;"></canvas>
    <div id="js-legend-bar" class="chart-legend"></div>
</div>

{!! app()->chartbar->render("BarChart", $data) !!}

<div class="container-fluid">2
    <canvas id="cenas" style="width:50%;"></canvas>
</div>

{!! app()->chartbar->render("cenas", $data2) !!}
@stop
