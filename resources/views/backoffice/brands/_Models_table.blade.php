
<script >
    $(document).ready( function( $ ) {        
        $( '.deleteLink' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = '/models/'+link.attr('data-id');

                    $.ajax({
                        url: postUrl,
                        type: 'post',
                        data: {_method: 'delete'},
                        success:function(msg) {
                            link.closest('tr').animate({'line-height':0},1000).hide(1);
                         },
                        error:function(msg) {
                           alert('Something wrong...');
                        }
                    });
        });
    });
</script>

<table class="table table-striped">
    <thead>
    <th> Name </th>
    <th> Code </th>
    <th> </th>
    </thead>
    <tbody>
         @forelse( $brandModels as $model) 
            <tr>
                <td>
                   {{ $model->name}}
                </td>
                <td>
                   {{ $model->code}}
                </td>
                <td>              
                    <div style="text-align: right;">
                        <a  href="#" class="deleteLink btn btn-default" data-id="{{$model->id}}">
                            <span><i class="fa fa-trash-o fa-fw"></i>  </span>
                        </a>
                    </div>
                </td>
            </tr>    
        @empty
            <tr>
                <td colspan="2">
                    No records to show...
                </td>
            </tr>
        @endforelse 
    </tbody>
  
</table>
        