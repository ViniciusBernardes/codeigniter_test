
<div class="row ">
  <div class="col-12 col-md-6 col-lg-8">
    <div class="card">
      <form class="needs-validation" novalidate="" action="<?=site_url('colecao/edit/'.$colecao['id'])?>" method="post">
        <div class="card-header">
          <h4>Alterar Coleção</h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nome da Coleção</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="colecao" required="" value="<?=$colecao['colecao']?>">
              <div class="invalid-feedback">
                Por favor, informe o nome da coleção
              </div>
            </div>
          </div>
          
          <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Descrição</label>
            <div class="col-sm-9">
              <textarea class="form-control" required="" name="descricao" ><?=$colecao['descricao']?></textarea>
              <div class="invalid-feedback">
                Forneça uma breve descrição da coleção
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="categoria" required="">
              <option value="" selected>Selecione...</option>
              <?
              foreach($categoria as $categorias)
              {
              ?>
                <option <? if($cat_prod[0]['categoria'] == $categorias['id']) echo 'selected="selected"' ?> value="<?=$categorias['id']?>"><?=$categorias['categoria']?></option>
              <?
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="d-block">Produtos</label>
            <? 
              $i = 0;
              foreach($produto as $produtos)
              {
                $checked = "";
                foreach($cat_prod as $cat_prods)
                {
                  if($cat_prods['produto'] == $produtos['id'])
                    $checked = "checked";
                }
            ?>
            <div class="form-check">
              <input class="form-check-input" <?=$checked?> type="checkbox" id="defaultCheck<?=$i?>" name="check_<?=$i?>" value="<?=$produtos['id']?>">
              <label class="form-check-label" for="defaultCheck<?=$i?>">
                <?=$produtos['produto']?>
              </label>
            </div>
            <?
              $i++;
              }
            ?>
            <input type="hidden" name="qnt" value="<?=$i?>" />
          </div>

        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Alterar</button>
        </div>
      </form>
    </div>
  </div>
</div>