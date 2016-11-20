
<div class="panel-heading">Bem Vindo à ReciOpel</div>
<div class="panel-body">
    Olá {{$username}},
    <p>Bem vindo à área de backoffice da reciopel.</p>
    <p>
    Aqui podes realizar operações de manutenção do web site tais como:
    <ul>
         <li {{ (Request::is('*part_types') ? 'class="active"' : '') }}>
             <a href="{{ url ('part_types') }}"><i class="fa fa-gears fa-fw"></i> Gerir os tipos de peças</a>
         </li>
         <li {{ (Request::is('*brands') ? 'class="active"' : '') }}>
             <a href="{{ url ('brands') }}"><i class="fa fa-tags fa-fw"></i> Gerir as Marcas disponíveis</a>
         </li>
         <li {{ (Request::is('*articles') ? 'class="active"' : '') }}>
             <a href="{{ url ('articles') }}"><i class="fa fa-folder-open-o fa-fw"></i> Gerir os artigos</a>
         </li>
    </ul>
    </p>
 </div>

@if(  isset($brandsCount))
    <div class="panel-heading" style="margin-top:20px;">Estatisticas de Utilização</div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>Configuração</th>
                <th>Contagem</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <i class="fa fa-tags fa-fw"></i> Marcas:
                    </td>
                    <td>
                        {{$brandsCount}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-tag fa-fw"></i> Modelos
                    </td>
                    <td>
                        {{$modelCount}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-gears fa-fw"></i> Tipos de Peças
                    </td>
                    <td>
                        {{$partTypeCount}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <i class="fa fa-folder-open-o fa-fw"></i> Artigos Criados
                    </td>
                    <td>
                        {{$articleCount}}
                    </td>
                </tr>
            </tbody>
        </table>
     </div>
@endif


@if( isset($contactList))
    <div class="panel-heading" style="margin-top:20px;">
      Inbox
    </div>
    <div class="panel-body">
      <table class="table table-striped ">
        <thead>
          <th>
            Person Name
          </th>
          <th>
            Phone
          </th>
          <th>
            Email
          </th>
          <th>
            Status
          </th>
          <th>
          </th>
        </thead>
        <tbody>
      @forelse( $contactList as $contactMessage)
        @if($contactMessage->isSeen )
            <tr>
        @else
            <tr style="font-weight: bold;">
        @endif
              <td>
                <a href="#" data-id="{{ $contactMessage->id }}" class="readLink"><i class="fa fa-pencil-square-o fa-fw"></i>
                    {{  $contactMessage->name  }}</a>
              </td>
              <td>
                    {{  $contactMessage->phone  }}
              </td>
              <td>
                   {{  $contactMessage->email  }}
              </td>
              <td>
                  @if($contactMessage->isSeen )
                     <span  title="It appears on the website">
                       <i class="fa fa-eye-slash "></i>
                        Is Seen
                     </span>
                  @else
                    <span title="This is a private article, only owner can see">
                      <i class="fa fa-eye "></i>
                       Unread
                    </span>
                  @endif
              </td>
              <td>

              </td>
            </tr>
            <tr id="{{ 'contactMessage' . $contactMessage->id }}" style="display:none;">
              <td style="border-bottom:1px double black;" colspan="5">
                  {{ $contactMessage->message }}
              </td>
            </tr>
      @empty
          <tr>
              <td colspan="6">
                  Sem mensagens por ler...
              </td>
          </tr>
      @endforelse

      </tbody>
      </table>
    </div>
    <script >
        $(document).ready( function(  ) {
            $( '.readLink' ).on( 'click', function(e){
                  "use strict";
                  e.preventDefault();
                  var link = $(this);
                  var dataid =link.attr('data-id');
                  var postUrl = '/readSiteContact/'+dataid;

                  // this function marks the message as read.
                  // if it is already read it does nothing
                  $.ajax({
                      url: postUrl,
                      type: 'post',
                      data: {_method: 'post'},
                      success:function(msg) {
                      },
                      error:function(msg) {
                          console.log(msg);
                      }
                  });

                  // this function allways toggles the content
                  $('#contactMessage'+dataid).toggle('slow');

                  return false;
            });
        });
    </script>
@endif
