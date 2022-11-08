  <!-- Modal -->
  @auth

      <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="{{ route('agenda-store') }}" method="post">
                          @csrf
                          <div>
                              <label for="titulo">Titulo:</label>
                              <input type="text" name="titulo">
                          </div>
                          <div>
                              <label for="titulo">Descrição:</label>
                              <input type="text" name="descricao">
                          </div>
                          <div>
                              <label for="titulo">Início:</label>
                              <input type="datetime-local" name="dt_inicio_agendamento" />
                          </div>
                          <div>
                              <label for="titulo">Fim:</label>
                              <input type="datetime-local" name="dt_fim_agendamento" />
                          </div>
                          <input type="number" name="usuario_id" hidden />

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                      <button type="submit" class="btn btn-primary">Fazer reserva</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  @endauth

  @guest


      <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p>Você ainda não está logado(a).</p>
                      <p>Faça o <a href="{{ route('login') }}">login</a> ou <a href="{{ route('index') }}">crie</a> uma
                          conta para continuar!</p>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                  </div>
              </div>
          </div>
      </div>

  @endguest
