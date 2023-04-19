@component('mail::message')

@foreach($data["items"] as $el)
<p class="item">
<p class="title">
    <a href='{{$el["link"]}}'>{{$el["title"]}}<br></a>
</p>

{{$el["displayLink"]}}<br>
{{$el["snippet"]}}<br>
</p>
@endforeach


<br><br>
Вы получаете этосообщение от {{config('app.name')}}, такакак офорили подписку нановые рузультыты поиска по запросу {{$text}}<br>
<a href=''>Список оповещиний<br></a>
<a href=''>Список оповещиний<br></a>

@endcomponent