   
<div style="width: 250px; height: 150px; margin-left: 20px; margin-top: 40px;
     border:1px solid gray; border-radius:4px; padding: 5px;display:inline-block;
     overflow: hidden;">
    <div style="padding-top:10px;">
        <a style="font-size:18px;"
            href="{{action('ShopsController@edit',[$shopId]) }}" > {{$shopName }} </a>
    </div>
    <hr>
    <div>
        <span>{{$shopDescription}}</span>
   </div>
   <div>
       <span>email: {{ $shopEmail}}  </span>
   </div>
</div>