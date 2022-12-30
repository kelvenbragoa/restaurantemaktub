{{-- MODAL DETALHES DE PRODUTO MENU DIGITAL --}}

<div class="modal fade" id="exampleModalprato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
           
            <div class="modal-body row">
                <div class="content col-sm-6">
                    <h3 class="title">Nosso prato do dia</h3>
                    <span class="sub-title">{{$dish_day->name}}</span>
                    <p class="description"> {{$dish_day->short_description}}</p>
                    <p class="description">Este é nosso prato do dia ao preço de {{$dish_day->price}} MT</p>
                    <a href="{{URL::to('/addcart/'.$dish_day->id)}}" class="btn_1 gradient">Pedir já</a>
                    
                   
                </div>
                <div class="content col-sm-6">
                    <img src="/storage/{{$dish_day->image}}" width="250" height="250">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn_1" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  