@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Pesquisa de pelas por marca ou tipo de peça.
                            Não sabe qual a referencia da peça que procura, nós ajudamos">
  <title>PcQar - Auto - Pesquisa de Peças</title>
@stop


@section('page_Heading')
<i class="fa fa-parts"></i> Pesquisa de Peças
@stop


@section('section')

@include('online_shop.partsSearch.components.partsSearch', ['modelsList' => $modelsList,
                                                          'brandsList' => $brandsList,
                                                          'partsList' => $partsList,
                                                          'articleTypeList' => $articleTypeList
                                                          ])

@stop
