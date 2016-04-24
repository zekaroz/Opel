@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
        <tr>
            <td class="title">
                Olá,
            </td>
        </tr>
        <tr>
            <td width="100%" height="10"></td>
        </tr>
        <tr>
            <td class="paragraph">
              <p>
                O cliente com o nome {{$customer_name}}, enviou um contacto com a seguinte mensagem.
              </p>
            </td>
        </tr>
        <tr>
            <td width="100%" height="25"></td>
        </tr>
        <tr>
            <td class="title">
                Mensagem de {{$customer_name}}
            </td>
        </tr>
        <tr>
            <td width="100%" height="10"></td>
        </tr>
        <tr>
            <td class="paragraph">
              <p>  {{$customerMessage}}
              </p>

            <p>
              <br>
              <br>
              <!-- /content -->
              <div class="customerDisplay">
                <p>Informações do Cliente:</p>
                <p><li> Número de telefone: {{$contact_number}};</li></p>
                <p><li> Email: {{$customer_email}};</li></p>
              </div>
            </p>

            </td>
        </tr>
        <tr>
            <td width="100%" height="25"></td>
        </tr>
        <tr>
            <td>
                @include('beautymail::templates.minty.button', ['text' => 'Ir para Reciopel', 'link' => 'http://reciopel.online'])
            </td>
        </tr>
        <tr>
            <td width="100%" height="25">
            </td>
        </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
