  <!-- Modal -->
  @auth

      <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar Serviço</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      @if (isset($erro))
                          <div class="alert alert-danger">
                              {{ $erro }}
                          </div>
                      @endif
                      <form action="{{ route('agenda-store') }}" method="post">
                          @csrf
                          <div class="mb-3">
                              <label for="nome_servico">Nome Serviço:</label>
                              <input type="text" name="nome_servico">
                          </div>
                          <div class="mb-3">
                              <label for="data">Data:</label>
                              <input type="date" name="data" />
                          </div>
                          <div class="mb-3">
                              <label for="horario">Horário:</label>
                              <select name="horario" id="horarios">
                                  <option value="0" selected></option>
                                  <optgroup label="Horários de Manhã">
                                      <option value="8:00">8:00</option>
                                      <option value="9:00">9:00</option>
                                      <option value="10:00">10:00</option>
                                      <option value="11:00">11:00</option>
                                  </optgroup>
                                  <optgroup label="Horários de Tarde">
                                      <option value="13:00">13:00</option>
                                      <option value="14:00">14:00</option>
                                      <option value="15:00">15:00</option>
                                      <option value="16:00">16:00</option>
                                      <option value="17:00">17:00</option>
                                  </optgroup>
                              </select>
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
