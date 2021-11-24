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
                    <h4>Gerenciar Produtos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Foto</th>
                            <th>Valor</th>
                            <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            //print_r($categoria);
                            foreach($produto as $produtos)
                            {
                          ?>
                          <tr>
                            <td>
                              <?=$produtos['id']?>
                            </td>
                            <td><?=$produtos['produto']?></td>
                            <td><?=$produtos['descricao']?></td>
                            <td>
                              <img alt="image" src="<?=base_url()."arquivo/produto/".$produtos['foto']?>" width="150">
                            </td>
                            <td>R$ <?=$this->moeda->format_valor($produtos['valor'])?></td>
                            <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-clipboard"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="<?=site_url('produto/editar/'.$produtos['id'])?>"><i class="far fa-edit"></i> Editar</a>
                                <a class="dropdown-item has-icon" href="javascript:excluir_produto(<?=$produtos['id']?>)"><i class="far fa-trash-alt"></i> Excluir</a>
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

function excluir_produto(id)
{
  swal({
    title: 'Atenção',
    text: 'Deseja excluir o Produto?',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        /*swal('Produto excluído com sucesso!', {
          icon: 'success',
        });*/
        url = '<?=site_url('produto')?>'+'/excluir/'+id;
        window.location = url;
      } 
    });
}

</script>