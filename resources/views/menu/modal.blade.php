{{-- MODAL DETALHES DE PRODUTO MENU DIGITAL --}}

<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                   
                        <img src="/storage/{{$item->image}}" alt="" width="250" height="250">
                    
                        <p>Descrição:{{$item->short_description}}</p>
                        <p>Descrição:{{$item->long_description}}</p>
                        <p>Preço: {{$item->price}} MT</p>
                  
                </div>
            </div>
             </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          
        </div>
      </div>
    </div>
  </div>