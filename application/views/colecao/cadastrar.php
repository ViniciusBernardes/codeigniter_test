

<div class="row ">
  <div class="col-12 col-md-6 col-lg-8">
    <div class="card">
      <form class="needs-validation" novalidate="" action="<?=site_url('colecao/cad')?>" method="post">
        <div class="card-header">
          <h4>Cadastrar Coleção</h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nome da Coleção</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="colecao" required="">
              <div class="invalid-feedback">
                Por favor, informe o nome da coleção
              </div>
            </div>
          </div>
          
          <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Descrição</label>
            <div class="col-sm-9">
              <textarea class="form-control" required="" name="descricao" ></textarea>
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
                <option value="<?=$categorias['id']?>"><?=$categorias['categoria']?></option>
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
            ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="defaultCheck<?=$i?>" name="check_<?=$i?>" value="<?=$produtos['id']?>">
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
          <button class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>