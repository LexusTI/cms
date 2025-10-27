<div class="flex-grow-1 container-p-y container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Cadastrar Usuário</h4>
          <button type="button" 
                  class="btn btn-label-secondary" 
                  onclick="window.history.go(-1); return false;">
              <i class="ti ti-arrow-left me-1"></i>
              Voltar
          </button>
        </div>
        
        <div class="card-body">          
          <form id="form-mascara" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <!-- Informações de Máscara -->
            <div class="row">
              <h6 class="fw-semibold">Informações do Usuário</h6>
              
              <div class="mb-3 col-md-6">                
                <label class="form-label">Nome:</label>
                <input class="form-control" 
                       type="text" 
                       id="nome" 
                       name="nome" 
                       value="" required/>                
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Sobrenome:</label>                
                <input class="form-control" 
                    type="text" 
                    id="sobrenome" 
                    name="sobrenome" 
                    value="" required/>
                              
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">E-mail:</label>                
                <input class="form-control" 
                    type="text" 
                    id="email" 
                    name="email" 
                    value="" required/>
                              
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Senha:</label>                
                <input class="form-control" 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    value="" required/>
                              
              </div>

              
            </div>

            <div class="mt-4" style="float: right;">
              <button type="submit" class="btn btn-primary me-2">
                  <i class="ti ti-device-floppy me-1"></i>
                  Salvar
              </button>
              <button type="button" class="btn btn-label-secondary me-2" onclick="window.history.go(-1); return false;">
                <i class="ti ti-arrow-left me-1"></i>
                Voltar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha)){

        $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha_hashed);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Cadastro de usuário realizado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro: " . $stmt->error . "</div>";
        }

        $stmt->close();

    } else {
        echo "<div class='alert alert-danger'>Por favor! Preencha todos os campos!</div>";
    }

    //$conn->close();
}
?>
