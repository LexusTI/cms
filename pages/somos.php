<!-- Kick start -->
<form action="index.php?page=somos" method="POST">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Quem Somos 🚀</h4>
      </div>
      <div class="card-body">
          <div class="card-text">
              <textarea class="form-control" id="content_somos" name="content_somos" rows="3"></textarea>
          </div>
      </div>
  </div>
  <!--/ Kick start -->

  <!-- Page layout -->
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Nossa Missão 🚀</h4>
      </div>
      <div class="card-body">
          <div class="card-text">
            <textarea class="form-control" id="content_missao"  name="content_missao" rows="3"></textarea>            
          </div>
      </div>
  </div>
  <!--/ Page layout -->

  <!-- Page layout -->
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Nossa Visão 🚀</h4>
      </div>
      <div class="card-body">
          <div class="card-text">
            <textarea class="form-control" id="content_visao"  name="content_visao" rows="3"></textarea>
          </div>
      </div>
  </div>
  <!--/ Page layout -->
  <div class="card">
    <div class="card-body">
      <button type="reset" class="btn btn-secondary">Limpar</button>
      <button type="submit" class="btn btn-success">Salvar</button>
    </div>
  </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $somos  = trim($_POST['content_somos'] ?? '');
    $missao = trim($_POST['content_missao'] ?? '');
    $visao  = trim($_POST['content_visao'] ?? '');

    // Exemplo de ação: salvar em arquivo, banco ou exibir mensagem
    echo "<div class='alert alert-success'>Dados salvos com sucesso!</div>";

    // Exemplo de debug (poderia remover depois)
    // echo "<pre>"; print_r($_POST); echo "</pre>";
}
?>
