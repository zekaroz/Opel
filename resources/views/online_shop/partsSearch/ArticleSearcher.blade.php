@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Pesquisa de pelas por marca ou tipo de peça.
                            Não sabe qual a referencia da peça que procura, nós ajudamos">
  <title>PcQar - Auto - {{  $searchPage_articleType  }}</title>
@stop


@section('page_Heading')
<i class="fa fa-parts"></i> {{ $searchPage_articleType->name  }}
@stop


@section('section')

@include('online_shop.partsSearch.components.partsSearch', ['modelsList' => $modelsList,
                                                          'brandsList' => $brandsList,
                                                          'partsList' => $partsList,
                                                          'articleTypeList' => $articleTypeList,
                                                          'articleType' => $searchPage_articleType
                                                            ])

@stop
