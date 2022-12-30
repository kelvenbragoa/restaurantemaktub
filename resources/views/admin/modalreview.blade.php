<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Comentário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{URL::to('/review/'.$item->id)}}" method="POST">
            @csrf
            @method('PATCH')
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-4">
                    <p><strong>Nome</strong>: {{$item->user->name}}</p>
                    <p><strong>Telefone</strong>: {{$item->user->mobile}}</p>
                    <p><strong>Nota Comida</strong>: {{$item->food}}</p>
                    <p><strong>Nota Serviço</strong>: {{$item->service}}</p>
                    <p><strong>Nota Pontualidade</strong>: {{$item->pontual}}</p>
                    <p><strong>Nota Preço</strong>: {{$item->price}}</p>
                    <p><strong>Nota Média</strong>: {{($item->price+$item->service+$item->pontual+$item->food)/5}}</p>
                </div>
                <div class="col-lg-8">
                    <p><strong>Comentário</strong>:</p>
                    <p>{{$item->review}}</p>
                    <p><strong>Resposta</strong> </p>
                    <textarea name="reply" class="form-control" id="" cols="30" rows="10">{{$item->reply}}</textarea>
                </div>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Responder</button>

        </div>
    </form>
      </div>
    </div>
  </div>