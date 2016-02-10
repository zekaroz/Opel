@extends('layouts.dashboard')

@section('page_heading')
Pictures Uploaded

 @stop

@section('section')
       
@include('fileentries.dropZone', [
                                    'postURL' => 'apply/upload',
                                    'dropId'  => 'myDropZone'])     
      
 <h3> Pictures list</h3>
 <div class="row">
        <ul class="thumbnails">
 @forelse($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $entry->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$entry->original_filename}}</p>
                    </div>
                </div>
            </div>
  @empty
        <div>No images to show...</div>
 @endforelse
 
 </ul>
 </div>

 
 
@stop