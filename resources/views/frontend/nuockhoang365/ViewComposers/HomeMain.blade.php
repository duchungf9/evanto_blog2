<section class="fixCen" id="content">
<div class="showProduct">
    @if(isset($params['featured_posts']))
        @foreach($params['featured_posts'] as $post)
            <?php

//                dump($json_params->price);die;
                $price = (isset($post->cost)?$post->cost:0);

                $period = (isset($post->unit)?$post->unit:'bình');
            ?>
            <div class="product">
                <div class="image" style="background-image: url({{$post->image}})">
                    <img src="{{$post->image}}"
                         alt="{{$post->title}}" width="470" height="470">
                </div>
                <h2>{{$post->title}}</h2>
                <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup class="period">/{{$period}}</sup></div>
                <div class="hr_color"></div>
                <div class="subtitle">{{$post->summary}}</div>
            </div>
        @endforeach
    @endif
</div>

    @if(isset($params['categories']))
        <?php $params['categories'] = ($params['categories'])->sortBy('id'); ?>
        @foreach($params['categories'] as $key=>$cat)
            <h2 class="pk-title"><i></i><span>{{$cat->name}}</span><i></i></h2>
            <div class="show-equiment">
                @if(isset($cat->products))
                    @foreach($cat->products as $post)

                        <div class="product">
                            <div class="image" style="background-image: url({{URL::to('/storage').'/'.$post->image}})">
                                <img src="{{URL::to('/storage').'/'.$post->image}}" alt="{{$post->title}}" width="488" height="488">
                            </div>
                            <h2>{{$post->title}}</h2>
                            <div class="price"><span>{{$post->cost}}</span><sup class="currency">đ</sup><sup class="period">/ bình</sup>
                            </div>
                            <div class="hr_color"></div>
                            <div class="subtitle">{{$post->description}}</div>
                        </div>
                    @endforeach
                @endif

            </div>
        @endforeach
    @endif
    @if(isset($params['phu-kien']))
    <h2 class="pk-title"><i></i><span>Phụ kiện</span><i></i></h2>
    <div class="show-equiment">
            @if(isset($params['phu-kien']->products))
                @foreach($params['phu-kien']->products as $key=>$value)
                    <?php
                    $json_params = json_decode($value->json_params);
                    //                dump($json_params->price);die;
                    $price = (isset($json_params->price)?$json_params->price:0);

                    $period = explode("/",$price);$period = isset($period[1])?$period[1]:"bình";
                    $price = explode(" ",$price); $price = isset($price[0])?$price[0]:0;

                    ?>
                    <div class="product">
                        <div class="image" style="background-image: url({{$value->image}})">
                            <img src="{{$value->image}}" alt="{{$value->title}}"
                                 width="488" height="488">
                        </div>
                        <h2>{{$value->title}}</h2>
                        <div class="price"><span>{{$price}}</span><sup class="currency">đ</sup><sup class="period">/ {{$period}}</sup>
                        </div>
                        <div class="hr_color"></div>
                        <div class="subtitle">{{$value->summary}}</div>
                    </div>
                @endforeach
            @endif
    </div>
    @endif
</section>
