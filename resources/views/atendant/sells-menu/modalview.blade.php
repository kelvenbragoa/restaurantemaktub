<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atualizar o Estado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Estado atual: @if ($item->status == 4) Pendente  @endif
            @if ($item->status == 3) Confirmado  @endif
            @if ($item->status == 2) Preparando @endif
            @if ($item->status == 1) Despachado @endif
          </h5>
          <form action="{{ route('sells-menu.update', $item->id)}}" method="POST">
            @csrf
            @method('PATCH')
                  <div class="container form-group">
                    {{-- <div class="row">
                
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="4" name="status" @if ($item->status == 4) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                          Pendente
                        </label>
                      </div>
                    
                    </div>
                    <div class="row">
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="3" name="status" @if ($item->status == 3) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                          Confirmado
                        </label>
                      </div>
                    
                    </div> --}}
                    <div class="row">
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="2" name="status" @if ($item->status == 2) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                          Preparando
                        </label>
                      </div>
                    
                    </div>
                    {{-- <div class="row">
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="status" @if ($item->status == 1) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                          Despachado
                        </label>
                      </div>
                    
                    </div> --}}
                    <div class="row">
                    
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="status" @if ($item->status == 0) checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                          Pronto
                        </label>
                      </div>
                    
                    </div>
                  </div>
              
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                  </div>
      </form>
      </div>
    </div>
  </div>