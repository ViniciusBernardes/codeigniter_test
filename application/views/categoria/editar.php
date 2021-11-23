<div class="row ">
  <div class="col-12 col-md-6 col-lg-8">
    <div class="card">
      <form class="needs-validation" novalidate="" action="<?=site_url('categoria/edit/'.$categoria['id'])?>" method="post" enctype="multipart/form-data">
        <div class="card-header">
          <h4>Editar Categoria</h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nome da categoria</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="categoria" value="<?=$categoria['categoria']?>" required="">
              <div class="invalid-feedback">
                Por favor, informe o nome da categoria
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Imagem</label>
            <div class="col-sm-9">
              <input type="hidden" name="foto" value="<?=$categoria['foto']?>" />
              <input type="file" class="form-control upload" name="img_upload" id='upload'>
              <div class="invalid-feedback">
                Faça o upload da imagem da categoria
              </div>
              <div style="margin-top: 20px; margin-bottom:20px;">
                <img class="imagem" src="<?=base_url()."arquivo/categoria/".$categoria['foto']?>" alt="" width="350" id="img">
              </div>
              <div>
                <button style="display:none" class="btn btn-primary btnAtualiza">Atualiza imagem</button>
              </div>
            </div>
          </div>
          <div class="form-group mb-0 row">
            <label class="col-sm-3 col-form-label">Descrição</label>
            <div class="col-sm-9">
              <textarea class="form-control" required="" name="descricao" ><?=$categoria['descricao']?></textarea>
              <div class="invalid-feedback">
                Forneça uma breve descrição do projeto
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Alterar</button>
        </div>
      </form>
    </div>
  </div>
</div>