<div class="cbp-loadMore-block1">
@foreach($loadFirst as $lf)
    <div class="graphic {{str_replace(' ','-',$lf->field_name)}} cbp-item">
        <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
                <img src="../assets/global/img/portfolio/600x600/015.jpg" alt=""> </div>
            <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <a href="/topic/{{$lf->topic_id}}" target="_blank" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase" rel="nofollow">more info</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cbp-l-grid-projects-title uppercase text-center">{{$lf->title}}</div>
        <div class="cbp-l-grid-projects-desc uppercase text-center">{{$lf->field_name}} / {{$lf->skills_name}}</div>
    </div>
@endforeach
</div>
<div class="cbp-loadMore-block2">
@foreach($loadSecond as $ls)
    <div class="graphic {{str_replace(' ','-',$ls->field_name)}} cbp-item">
        <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
                <img src="../assets/global/img/portfolio/600x600/11.jpg" alt=""> </div>
            <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <a href="/topic/{{$ls->topic_id}}" target="_blank" class=" cbp-l-caption-buttonLeft btn red uppercase" rel="nofollow">more info</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="cbp-l-grid-projects-title uppercase text-center">{{$ls->title}}</div>
        <div class="cbp-l-grid-projects-desc uppercase text-center">{{$ls->field_name}} / {{$ls->skills_name}}</div>
    </div>
@endforeach
</div>