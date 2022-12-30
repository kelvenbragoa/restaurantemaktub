@extends('layouts.master')
@section('content')
<main class="bg_gray">
		
    <div class="container margin_60_20">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{route('reviews.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="box_general write_review">
                    <h1 class="add_bottom_15">Por favor, deixe um comentário sobre a sua entrega.</h1>
                    <label class="d-block add_bottom_15">O seu comentário é muito importante para nós, assim podemos melhorar os nossos serviços e atender melhor a voce.</label>
                    <label class="d-block add_bottom_15">Pontuação</label>
                    <div class="row">
                        <div class="col-md-3 add_bottom_25">
                            <div class="add_bottom_15">Refeição <strong class="food_quality_val"></strong></div>
                            <input type="range" min="0" max="5" step="1" value="0" data-orientation="horizontal" id="food_quality" name="food" required>
                        </div>
                        <div class="col-md-3 add_bottom_25">
                            <div class="add_bottom_15">Serviço <strong class="service_val"></strong></div>
                            <input type="range" min="0" max="5" step="1" value="0" data-orientation="horizontal" id="service" name="service" required>
                        </div>
                        <div class="col-md-3 add_bottom_25">
                            <div class="add_bottom_15">Pontualidade <strong class="location_val"></strong></div>
                            <input type="range" min="0" max="5" step="1" value="0" data-orientation="horizontal" id="location" name="pontual" required>
                        </div>
                        <div class="col-md-3 add_bottom_25">
                            <div class="add_bottom_15">Preço <strong class="price_val"></strong></div>
                            <input type="range" min="0" max="5" step="1" value="0" data-orientation="horizontal" id="price" name="price" required>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label>Escreve o seu comentário</label>
                        <textarea class="form-control" style="height: 180px;" name="review" placeholder="Escreve a experiência que teve a nossa entrega a domicilio" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Adicionar uma foto (opcional)</label>
                        <div class="fileupload"><input type="file" name="image" accept="image/*"></div>
                    </div>
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="sell_id" value="{{$sell_id}}">
                    
                    <button type="submit" class="btn_1">Submeter Comentário</button>
                </div>
            </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
</main>


@endsection