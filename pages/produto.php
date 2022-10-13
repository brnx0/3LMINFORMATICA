<?php require '.\admin/validar.php';?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProduto" >
    Produtos
</button>
   <div class="modal" tabindex="-1" id="modalProduto" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastro de produtos </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <form action=".\admin/validar.php" method="post" id=formProdutos>    <!--   /*Formulario de insert na tabela Produtos*/ -->
                <div class=descricao>
                  <h6>Descrição</h6>
                  <input type="text" name="descricao" ">
                </div>
                <div>
                  <H6>UND</H6>
                  <select name="und" id="">
                    <option value="">-</option selected>
                    <option value="und">UND</option>
                    <option value="cx">CX</option>
                    <option value="kg">KG</option>
                    <option value="l">L</option>
                    <option value="m">M</option>
                  </select>
                </div>
                <div >
                  <H6>Grupo</H6>
                  <select name="grupo">
                    <option value="" selected>-</option>
                    <?php /**Trazer os valores da tabela Grupo */
                      require './admin/validar.php';
                      foreach ($grupo->read() as $grupo->row ):
                    ?>
                      <option value="<?= $grupo->row['id']?>">  <?=$grupo->row['grupo']?> </option>
                    <?php endforeach; ?>
                  </select> 
                </div>
                <Div>
                  <h6>Tipo</h6>
                  <select name="tipo" id="">
                    <option value="">-</option selected>
                    <option value="pa">PA</option>
                    <option value="mp">MP</option>
                  </select>
                </Div>
                <div>
                  <h6>Cod. Barras</h6>
                  <input type="text" name="codBarras" id="">
                </div>
                <div>
                  <h6>Saldo</h6>
                  <input type="number" name="saldo"  step="any" id="">
                </div>
              </form>
            </div>
            <table>
              <thead>
                <tr>
                  <td>Descrição</td>
                  <td>Cod.Barras</td>
                  <td>UND.</td>
                  <td>Grupo</td>
                  <td>Tipo</td>
                  <td>Saldo</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produto->read() as $produto->row):?>
                  <tr>
                    <td><?=$produto->row['descricao'];?></td>
                    <td><?=$produto->row['codBarra'];?></td>
                    <td><?=$produto->row['undMedida'];?></td>
                    <?php foreach ($produto->select($produto->row['grupo']) as $produto->row1):?> <!--Trazer o nome do grupo que o produto pertence -->
                      <td><?=$produto->row1['grupo']?></td>
                    <?php endforeach;?>
                    <td><?=$produto->row['tipo'];?></td>
                    <td><?=$produto->row['saldo'];?></td>
                  </tr>
                  
                <?php endforeach ?>

              </tbody>
            </table>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button form="formProdutos"class="btn btn-primary" name="produto" value="produto">Salvar</button>
            </div>
          </div>
        </div>
      </div>