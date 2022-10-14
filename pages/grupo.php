<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGrupo" >
    Grupo
</button>
   <div class="modal" tabindex="-1" id="modalGrupo" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastro de grupo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action=".\admin/validar.php" method="post" id="formGrupo">
                    <label for="">Descrição</label> 
                    <input type="text" placeholder="Grupo" name="grupo"required>
                    <input type="text" hidden value="grupo" name=validar>
                </form>          
            </div>
            <div class="listagemGrupos">
          
              <table>
                <thead>
                  <tr>
                    
                    <td>Grupos</td>
                  </tr>
                </thead>
                
                <tbody>
                <?php
                    require_once '.\admin/validar.php';
                    foreach ($grupo->read() as $grupo->row): ?>
                   <tr class="linha">
                      
                      <td><?= $grupo->row['grupo']?>      </td>
                      <td id="check">
                        <form action=".\admin/validar.php" id="excluirGrupo" method="post">
                          <input type="radio" name="idGrupo" value="<?=$grupo->row['id']; ?>">
                        </form>
                      </td>

                  </tr>
                  <?php endforeach ?>
                </tbody>
                

              </table>
                
            </div>
            <div class="modal-footer">
            <button form="excluirGrupo" class="btn btn-secondary" name="delete" value="grupo">Excluir</button>
              <button  form="formGrupo" class="btn btn-primary" name="inserir" value="grupo" >Salvar</button>
            </div>
          </div>
        </div>
      </div>