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
                            <th>Descrição</th>
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
                            <td><?=$categorias['descricao']?></td>
                            <td>
                              <img alt="image" src="<?=base_url()."arquivo/categoria/".$categorias['foto']?>" width="150">
                            </td>
                            <td><?=$this->datas->EnToBr($categorias['data'])?></td>
                            <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-clipboard"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="<?=site_url('categoria/editar/'.$categorias['id'])?>"><i class="far fa-edit"></i> Editar</a>
                                <a class="dropdown-item has-icon" href="javascript:excluir_categoria(<?=$categorias['id']?>)"><i class="far fa-trash-alt"></i> Excluir</a>
                              </div>
                            </div>
                            </td>
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
<script>

function excluir_categoria(id)
{
  swal({
    title: 'Atenção',
    text: 'Deseja excluir a categoria?',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        /*swal('Arquivo excluído com sucesso!', {
          icon: 'success',
        });*/
        url = '<?=site_url('categoria')?>'+'/excluir/'+id;
        window.location = url;
      } 
    });
}

</script>