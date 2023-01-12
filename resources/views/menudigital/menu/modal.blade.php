{{-- MODAL DETALHES DE PRODUTO MENU DIGITAL --}}

<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="{{URL::to('storecart')}}" method="POST">
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$item->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
         <div class="card">
             <div class="card-header">
                <h3>{{$item->name}}</h3>
             </div>
             
             <div class="card-body">
                 <div class="container">
                <div class="row">
                  <div class="col">
                    <img src="/storage/{{$item->image}}" alt="" width="250" height="250">
                  </div>
                  <div class="col">
                    <p><strong>Descrição</strong>:{{$item->short_description}}</p>
                    <p><strong>Descrição</strong>:{{$item->long_description}}</p>
                    <p><strong>Preço</strong>: {{$item->price}} MT</p>
                    <p>Quantidade: <input type="number" value="1" name="qtd" min="1" max="10" class="class"> </p>
                  </div>
                   
                        
                  <input type="hidden" value="{{$item->id}}" name="product_id">
                  <input type="hidden" value="{{$usermenu->id}}" name="user_menu_id">
                    
                       
                  
                </div>
            </div>
             </div>
         </div>
        </div>
        <div class="modal-footer">
         
          @if ($item->is_deleted == 0 && $item->status ==1 )
          <button class="btn_1 medium gradient pulse_bt mt-2" type="submit">Adicionar ao carrinho</button>
          @else
          <a class="btn_1 medium gradient pulse_bt mt-2" type="">Este produto está indisponível</a>
          @endif
          <button type="button" class="btn_1 gradient" data-dismiss="modal">Fechar</button>
          
        </div>
      </div>
      </form>

    </div>
  </div>