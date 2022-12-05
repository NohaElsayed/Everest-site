
  <div class="container-fluid" style="padding-top:5px;">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-sm-12 {{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://codewithsadee.github.io/anon-ecommerce-website/assets/images/banner-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://codewithsadee.github.io/anon-ecommerce-website/assets/images/banner-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://codewithsadee.github.io/anon-ecommerce-website/assets/images/banner-3.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-12 {{Session::get('direction') === "rtl" ? 'left' : 'right'}}">
                @php($categories=\App\Model\Category::with(['childes.childes'])->where('position',
                0)->priority()->paginate(11))
                <ul
                    class="navbar-nav mega-nav pr-2 pl-2 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}} d-none d-xl-block ">
                    <!--web-->
                    <li class="navs side-baring nav-item {{!request()->is('/')?'dropdown':''}}">
                        <a class="nav-link  dropdown-toggle {{Session::get('direction') === "rtl" ? 'pr-0' : 'pl-0'}}"
                            href="#" data-toggle="dropdown"
                            style=" color :#fff !important;{{request()->is('/')?'pointer-events: none':''}}">
                            <i
                                class="czi-menu align-middle mt-n1 {{Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'}}"></i>
                            <span
                                style="color :#fff !important; margin-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 40px !important;margin-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}: 50px">
                                {{ \App\CPU\translate('categories')}}
                            </span>
                        </a>
                        @if(request()->is('/'))
                        <ul class="dropdown-menu"
                            style="right: 0%; display: block!important;
                                    margin-top: 8px;border: 1px solid #ccccccb3;
                                    border-bottom-left-radius: 5px;
                                    border-bottom-right-radius: 5px; box-shadow: none;{{Session::get('direction') === "rtl" ? 'margin-right: 1px!important;text-align: right;' : 'margin-left: 1px!important;text-align: left;'}}padding-bottom: 0px!important;">
                            @foreach($categories as $key=>$category)
                            @if($key<8) <li class="dropdown" style="padding:10px;">
                                <a class="dropdown-item flex-between"
                                    <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?>
                                    href="javascript:"
                                    onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                                    <div style="display:flex">
                                        <img src="{{asset("storage/app/public/category/$category->icon")}}"
                                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                            style="width: 18px; height: 18px; ">
                                        <span
                                            class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>
                                    </div>
                                    @if ($category->childes->count() > 0)
                                    <div>
                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                            style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                    </div>
                                    @endif
                                </a>
                                @if($category->childes->count()>0)
                                <ul class="dropdown-menu"
                                    style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    @foreach($category['childes'] as $subCategory)
                                    <li class="dropdown">
                                        <a class="dropdown-item flex-between"
                                            <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?>
                                            href="javascript:"
                                            onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                            <div>
                                                <span
                                                    class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                            </div>
                                            @if ($subCategory->childes->count() > 0)
                                            <div>
                                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                                    style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                            </div>
                                            @endif
                                        </a>
                                        @if($subCategory->childes->count()>0)
                                        <ul class="dropdown-menu"
                                            style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                            @foreach($subCategory['childes'] as $subSubCategory)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                    </li>
                    @endif
                    @endforeach
                    <a class="dropdown-item text-capitalize" href="{{route('categories')}}"
                        style="color: {{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 29%">
                        {{\App\CPU\translate('view_more')}}

                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                            style="font-size: 12px !important;background:none !important;color:#4B5864;"></i>
                    </a>
                </ul>
                @else
                <ul class="dropdown-menu"
                    style="right: 0; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                    @foreach($categories as $category)
                    <li class="dropdown">
                        <a class="dropdown-item flex-between <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown"?> "
                            <?php if ($category->childes->count() > 0) echo "data-toggle='dropdown'"?>
                            href="javascript:"
                            onclick="location.href='{{route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])}}'">
                            <div>
                                <img src="{{asset("storage/app/public/category/$category->icon")}}"
                                    onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                    style="width: 18px; height: 18px; ">
                                <span
                                    class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$category['name']}}</span>
                            </div>
                            @if ($category->childes->count() > 0)
                            <div>
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                    style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                            </div>
                            @endif
                        </a>
                        @if($category->childes->count()>0)
                        <ul class="dropdown-menu"
                            style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                            @foreach($category['childes'] as $subCategory)
                            <li class="dropdown">
                                <a class="dropdown-item flex-between <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown"?> "
                                    <?php if ($subCategory->childes->count() > 0) echo "data-toggle='dropdown'"?>
                                    href="javascript:"
                                    onclick="location.href='{{route('products',['id'=> $subCategory['id'],'data_from'=>'category','page'=>1])}}'">
                                    <div>
                                        <span
                                            class="{{Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'}}">{{$subCategory['name']}}</span>
                                    </div>
                                    @if ($subCategory->childes->count() > 0)
                                    <div>
                                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                                            style="font-size: 8px !important;background:none !important;color:#4B5864;"></i>
                                    </div>
                                    @endif
                                </a>
                                @if($subCategory->childes->count()>0)
                                <ul class="dropdown-menu"
                                    style="right: 100%; text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                                    @foreach($subCategory['childes'] as $subSubCategory)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{route('products',['id'=> $subSubCategory['id'],'data_from'=>'category','page'=>1])}}">{{$subSubCategory['name']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <a class="dropdown-item" href="{{route('categories')}}"
                        style="color: {{$web_config['primary_color']}} !important;{{Session::get('direction') === "rtl" ? 'right' : 'left'}}: 29%">
                        {{\App\CPU\translate('view_more')}}

                        <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left' : 'right'}}"
                            style="font-size: 8px !important;background:none !important;color:{{$web_config['primary_color']}} !important;"></i>
                    </a>
                </ul>
                @endif
                </li>
                </ul>

            </div>
    </div>
  </div>









   <style>
    .offer .bg-secondary{
      background-color:#2ebd30 !important;
    }
.pt-5, .py-5 {
    padding-top: 3rem !important;
}
img {
    vertical-align: middle;
    border-style: none;
}
.offer img {
    position: absolute;
    max-width: 100%;
    max-height: 100%;
    bottom: 0;
}
.offer .text-md-right img {
    left: 0;
}
.offer .text-md-left img {
    right: 0;
}
.text-white {
    color: #fff !important;
}

@media (min-width: 768px){

  .text-md-right {
      text-align: right !important;
  }
}
@media (min-width: 768px){
  .text-md-left {
      text-align: left !important;
  }
}
.offer .text-md-left img {
    right: 0;
}

.pb-4, .py-4 {
    padding-bottom: 1.5rem !important;
}
.btn-outline-primary:hover,.btn-outline-primary {
    color: #fff;
    background-color:#2ebd30 !important;
}
.offer a{
  border: none !important;
}
</style>
