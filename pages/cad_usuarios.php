<?php
include('conn.php');

// Inicializa variáveis para evitar erro ao carregar formulário
$usuario = [
    'id' => '',
    'nome' => '',
    'sobrenome' => '',
    'email' => ''
];

// Se for edição, carrega os dados
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    }
    $stmt->close();
}
?>
<div class="flex-grow-1 container-p-y container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="mb-0">
            <?php echo $usuario['id'] ? 'Editar Usuário' : 'Cadastrar Usuário'; ?>
          </h4>
          <button type="button" 
                  class="btn btn-label-secondary" 
                  onclick="window.history.go(-1); return false;">
              <i class="ti ti-arrow-left me-1"></i>
              Voltar
          </button>
        </div>
        
        <div class="card-body">          
          <form id="form-usuario" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="row">
              <h6 class="fw-semibold">Informações do Usuário</h6>
              
              <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

              <div class="mb-3 col-md-6">                
                <label class="form-label">Nome:</label>
                <input class="form-control" type="text" id="nome" name="nome" 
                       value="<?php echo $usuario['nome']; ?>" required/>                
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Sobrenome:</label>                
                <input class="form-control" type="text" id="sobrenome" name="sobrenome" 
                       value="<?php echo $usuario['sobrenome']; ?>" required/>
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">E-mail:</label>                
                <input class="form-control" type="email" id="email" name="email" 
                       value="<?php echo $usuario['email']; ?>" required/>
              </div>

              <div class="col-md-6 mb-4">
                <label class="form-label">Senha:</label>
                <input class="form-control" type="password" id="senha" name="senha"
                       <?php echo empty($usuario['id']) ? 'required' : ''; ?>/>
                <?php if (!empty($usuario['id'])): ?>
                  <small class="text-muted">Deixe em branco para manter a senha atual.</small>
                <?php endif; ?>
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
// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nome      = trim($_POST['nome']);
    $sobrenome = trim($_POST['sobrenome']);
    $email     = trim($_POST['email']);
    $senha     = trim($_POST['senha']);

    if (!empty($nome) && !empty($sobrenome) && !empty($email)) {
        if ($id > 0) {
            // UPDATE
            if (!empty($senha)) {
                $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE usuarios SET nome=?, sobrenome=?, email=?, senha=? WHERE id=?");
                $stmt->bind_param("ssssi", $nome, $sobrenome, $email, $senha_hashed, $id);
            } else {
                $stmt = $conn->prepare("UPDATE usuarios SET nome=?, sobrenome=?, email=? WHERE id=?");
                $stmt->bind_param("sssi", $nome, $sobrenome, $email, $id);
            }

            if ($stmt->execute()) {
                echo "<script>alert('Usuário atualizado com sucesso!'); window.location='?page=list_usuarios';</script>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao atualizar: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } else {
            // INSERT
            if (!empty($senha)) {
                $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha_hashed);

                if ($stmt->execute()) {
                    echo "<script>alert('Usuário cadastrado com sucesso!'); window.location='?page=list_usuarios';</script>";
                } else {
                    echo "<div class='alert alert-danger'>Erro ao cadastrar: " . $stmt->error . "</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>A senha é obrigatória para novo cadastro!</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor, preencha todos os campos obrigatórios!</div>";
    }
}
?>
