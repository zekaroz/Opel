
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
