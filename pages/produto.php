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
                  <input type="text" name="descricao" id="name" required ">
                </div>
                <div>
                  <H6>UND</H6>
                  <select name="und" id="" required>
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
                  <select name="grupo" required>
                    <option value="" selected required >-</option>
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
                  <select name="tipo" id="" required>
                    <option value="">-</option selected>
                    <option value="pa">PA</option>
                    <option value="mp">MP</option>
                  </select>
                </Div>
                <div>
                  <h6>Cod. Barras</h6>
                  <input type="text" name="codBarras" id="name" required>
                </div>
                <div>
                  <h6>Saldo</h6>
                  <input type="number" name="saldo"  step="any" id="" required>
                </div>
              </form>
            </div>
            <table >
              <thead>
                <tr >
                  <td id="desc">Descrição</td>
                  <td id="cod">Cod.Barras</td>
                  <td id="und">UND.</td>
                  <td id="gp">Grupo</td>
                  <td id="tp">Tipo</td>
                  <td id="saldo">Saldo</td>
                  <td id="check"></td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produto->read() as $produto->row):?>
                  
                  <tr class="linha" id="<?=$produto->row['idProduto'];?>">
                    <td id="desc" ><?=$produto->row['descricao'];?></td>
                    <td id="cod"><?=$produto->row['codBarra'];?></td>
                    <td id="und"><?=$produto->row['undMedida'];?></td>
                    <?php foreach ($produto->select($produto->row['grupo']) as $produto->row1):?> <!--Trazer o nome do grupo que o produto pertence -->
                      <td  id="gp"><?=$produto->row1['grupo']?></td>
                    <?php endforeach;?>
                    <td id="tp" ><?=$produto->row['tipo'];?></td>
                    <td  id="saldo"><?=$produto->row['saldo'];?></td>
                   
                      <td id="check">
                        <form action=".\admin/validar.php" id="excluirProduto" method="post">
                          <input type="radio" name="idProduto" value="<?=$produto->row['idProduto']; ?>">
                        </form>
                      </td>
                    
                  </tr>
                  
                <?php endforeach ?>

              </tbody>
            </table>


            <div class="modal-footer">
              <button form="excluirProduto" class="btn btn-secondary" name="delete" value="produto">Excluir</button>
              <button form="formProdutos"class="btn btn-primary" name="inserir" value="produto">Salvar</button>
            </div>
          </div>
        </div>
      </div>