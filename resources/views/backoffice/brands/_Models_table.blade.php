
<script >
    function destroyModel(modelid){
        var postUrl = '/models/'+modelid;
        
        $.ajax({
        url: postUrl,
        type: 'post',
        data: {_method: 'delete'},
        success:function(msg) {
                document.location.reload(true);
            },
         error:function(msg) {
               alert('Cant Delete');  
            }
        });
    }
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
                    <div>
                        <a  href="javascript:destroyModel({{$model->id}});">
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
        