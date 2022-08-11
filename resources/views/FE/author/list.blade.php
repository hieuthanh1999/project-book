@extends('FE.layout_cart')
@section('content')

<div class="tg-authorsgrid">
    <div class="container">
        <div class="row">
            <div class="tg-authors">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead">
                        <h2><span></span>Tác giả nổi tiếng nhất</h2>
                    </div>
                </div>
                @foreach ($authors as $values)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="tg-author">
                        <figure><img style="object-fit: contain;     height: 150px;"
                                src="{{URL::asset('image/author/'.$values['author_image'])}}" alt="image description">
                        </figure>
                        <div class="tg-authorcontent">
                            <h2><a href="tac-gia-{{$values['id']}}">{{$values['name']}}</a></h2>
                            <span>Sách đã xuất bản: {{$values->count()}}</span>
                            <ul class="tg-socialicons">
                                <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection