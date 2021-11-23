<?php if($this->session->tempdata('message_erro')): ?>
    <div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      <?php echo $this->session->tempdata('message_erro'); ?>
    </div>
  </div>
<?php endif; ?>
<?php if($this->session->tempdata('message_ok')): ?>
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      <?php echo $this->session->tempdata('message_ok'); ?>
    </div>
  </div>
<?php endif; ?>
  
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Gerenciar Categoria</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Categoria</th>
                            <th>Foto</th>
                            <th>Data cadastro</th>
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            //print_r($categoria);
                            foreach($categoria as $categorias)
                            {
                          ?>
                          <tr>
                            <td>
                              <?=$categorias['id']?>
                            </td>
                            <td><?=$categorias['categoria']?></td>
                            <td>
                              <img alt="image" src="<?=base_url()."arquivo/categoria/".$categorias['foto']?>" width="50">
                            </td>
                            <td><?=$this->datas->EnToBr($categorias['data'])?></td>
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                          </tr>
                          <?
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>