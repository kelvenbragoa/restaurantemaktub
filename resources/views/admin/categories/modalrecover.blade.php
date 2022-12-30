<div class="modal" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Deseja recuperar este item: <br>"{{$item->name}}"</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Esta prestes a recuperar este item do seu registro.
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ URL::to('/recover/categories')}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="category_id" value="{{$item->id}}" id="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Submeter</button>
            </form>
          
        </div>
      </div>
    </div>
  </div>