<table class="table table-striped">
    <thead>
    <th> Name </td>
    <th> Code </td>
    </thead>

    @forelse( $brandModels as $model) 
        <tr>
            <td>
               {{ $model->name}}
            </td>
            <td>
               {{ $model->code}}
            </td>
            <td></td>
            <td>
            </td>
        </tr>    
    @empty
        <tr>
            <td colspan="2">
                No records to show...
            </td>
        </tr>
    @endforelse
</table>
        