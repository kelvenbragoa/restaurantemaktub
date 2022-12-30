@extends('layouts.master')
@section('content')
<main class="bg_gray">
		
    <div class="container margin_30_20">
        
        <div class="row">
           
            <div class="col-lg-12 list_menu">
                
                <section id="section-5">
                    <h4>Reviews</h4>
                    <p> @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                        @endif</p>
                    <div class="row add_bottom_30 d-flex align-items-center reviews">
                       
             
                        <div class="col-md-3">
                            <div id="review_summary">
                                <strong>{{round($average)}}</strong>
                                
                                <small>Baseado em {{$review->count()}} comentários</small>
                            </div>
                        </div>
                        <div class="col-md-9 reviews_sum_details">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Qualidade Comida</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{(100*$mfood)/5}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{round($mfood)}}</strong></div>
                                    </div>
                                    <!-- /row -->
                                    <h6>Serviço</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{(100*$mservice)/5}}%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{round($mservice)}}</strong></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <div class="col-md-6">
                                    <h6>Pontualidade</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{(100*$mpontual)/5}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{round($mpontual)}}</strong></div>
                                    </div>
                                    <!-- /row -->
                                    <h6>Preço</h6>
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-9 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{(100*$mprice)/5}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-3"><strong>{{round($mprice)}}</strong></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                    </div>
                    <!-- /row -->
                     <div id="reviews">
                        
                        <!-- /review_card -->
                        @foreach ($review as $item)

                        <div class="review_card">
                            <div class="row">
                                
                                <div class="col-md-2 user_info">
                                    <figure><img src="storage/{{$item->user->image}}" alt=""></figure>
                                    <h5>{{$item->user->name}}</h5>
                                </div>
                                <div class="col-md-6 review_content">
                                    <div class="clearfix add_bottom_15">
                                        <span class="rating">{{($item->food+$item->service+$item->pontual+$item->price)/5}}<small>/5</small> <strong>Média do Comentário</strong></span>
                                        <em>Publicado: {{$item->created_at}}</em>
                                    </div>
                                    
                                    <p>{{$item->review}}</p>
                                    <!-- /row<ul>
                                        <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
                                        <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                        <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
                                    </ul> -->
                                </div>
                                <div class="col-md-4 review_content">
                                    
                                    
                                    <img src="storage/{{$item->image}}" class="w-100" width="250" height="250" alt="">
                                    <!-- /row<ul>
                                        <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
                                        <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
                                        <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <!-- /row -->
                            @if ($item->reply != null)
                            <div class="row reply">
                                <div class="col-md-2 user_info">
                                    <figure><img src="{{asset('template/img/logo_sticky.png')}}" alt=""></figure>
                                </div>
                                <div class="col-md-10">
                                    <div class="review_content">
                                        <strong>Resposta Administrador</strong>
                                        
                                        <p>{{$item->reply}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /reply -->
                            @endif
                            
                        </div>
                        <!-- /review_card -->
                        @endforeach
                        
                    </div>
                    <!-- /reviews -->
                    
                </section>
                <!-- /section -->
            </div>
        </div>
    </div>
    <!-- /container -->
    
</main>


@endsection