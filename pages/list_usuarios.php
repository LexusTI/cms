<div class="flex-grow-1 container-p-y container-fluid">
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">
                <div style="vertical-align: inherit;">
                    <h4 style="vertical-align: inherit;">Usuários</h4>
                </div>
            </h5>
        </div>
        <div class="col-12">
            <div>
                <div class="row">
                    <!-- / Content -->
                    <div class="card-datatable table-responsive pt-0">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="card-header flex-column flex-md-row">
                                <div class="head-label text-center">
                                    <h5 class="card-title mb-0"></h5>
                                </div>
                                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a class="btn btn-secondary add-new btn-primary"
                                        href="?page=cad_usuarios">
                                            <i class="ti ti-plus me-0 me-sm-1 ti-sm"></i>
                                            <span class="d-none d-sm-inline-block">Adicionar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- / Content -->                              
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row me-2">
                                        <div class="col-md-2">
                                            <div class="me-3">
                                                <div class="dataTables_length" id="DataTables_Table_0_length"></div>
                                            </div>
                                        </div> 
                                        <div class="col-md-10">
                                            <div
                                                class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabela de usuários -->
                                    <table class="datatables-users table border-top dataTable no-footer dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr>
                                                <th class="sortable sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 400px; "
                                                aria-label="Nome: ative para classificar a coluna em ordem crescente"> 
                                                    <span style="vertical-align: inherit;" class="d-flex justify-content-center">
                                                        <span style="vertical-align: inherit;text-transform: capitalize;">Nome</span>
                                                    </span>
                                                </th>
                                                <th class="sortable sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 176.58px;"
                                                aria-label="Sobrenome: ative para classificar a coluna em ordem crescente"> 
                                                    <span style="vertical-align: inherit;" class="d-flex justify-content-center">
                                                        <span style="vertical-align: inherit;text-transform: capitalize;">Sobrenome</span>
                                                    </span>
                                                </th>
                                                <th class="sortable sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 176.58px;"
                                                aria-label="E-mail: ative para classificar a coluna em ordem crescente"> <span
                                                        style="vertical-align: inherit;" class="d-flex justify-content-center">
                                                        <span style="vertical-align: inherit;text-transform: capitalize;">E-mail</span>
                                                    </span>
                                                </th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 176.58px;"
                                                    aria-label="Ações">
                                                    <span style="vertical-align: inherit;"
                                                        class="d-flex justify-content-center">
                                                        <span style="vertical-align: inherit;text-transform: capitalize;">Ações</span>
                                                    </span>
                                                </th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ######################### Listagem de usuários ######################### -->
                                            <?php
                                            include('conn.php'); // Inclui a conexão

                                            $sql = "SELECT id, nome, sobrenome, email FROM usuarios ORDER BY id DESC";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($usuario = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr class="odd">
                                                    <td class="v-data-table__td v-data-table-column--align-start"
                                                        style="width: 400px; ">
                                                        <div class="d-flex align-center">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="text-base mb-0">                                                                    
                                                                   <?php echo $usuario['nome']; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" style="width: 176.58px;"
                                                    colspan="1"
                                                    aria-label="Plano: ative para classificar a coluna em ordem crescente">
                                                        <span class="d-flex justify-content-center">
                                                            <?php echo $usuario['sobrenome']; ?>
                                                        </span>
                                                    </td>

                                                    <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" style="width: 176.58px;"
                                                    colspan="1"
                                                    aria-label="Plano: ative para classificar a coluna em ordem crescente">                                                            
                                                        <span class="badge rounded-pill bg-label-success d-flex justify-content-center" draggable="false">
                                                            <?php echo $usuario['email']; ?>
                                                        </span>                                                            
                                                    </td>

                                                    <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" style="width: 176.58px;"
                                                    colspan="1" 
                                                    aria-label="Plano: ative para classificar a coluna em ordem crescente">                                                            
                                                        <div class="justify-content-center" style="text-align: center;">                                                                
                                                                
                                                            <!-- Verificando permissão para editar a usuário  -->                                                                
                                                            <a class="btn-lg btn-icon rounded-pill btn-outline-dark" title='Editar usuário'
                                                                href="?page=cad_usuarios&id=<?php echo $usuario['id']; ?>">
                                                                <i class="ti ti-edit ti-sm"></i>
                                                            </a>
                                                            
                                                            <!-- Verificando permissão para excluir a usuário  -->
                                                            <a class='btn-lg btn-icon rounded-pill btn-outline-dark'
                                                            title='Excluir usuário'
                                                            href="?page=list_usuarios&acao=excluir&id=<?php echo $usuario['id']; ?>"
                                                            onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                                                <i class='ti ti-trash ti-sm'></i>
                                                            </a>
                                                            
                                                            <!-- Verificando permissão para ativar/desativar a usuário  -->                                                               
                                                            <label class="switch switch-square switch">
                                                                <a>
                                                                    <input
                                                                        id="switch-input{{mascara.id}}" 
                                                                        value="#" 
                                                                        type="checkbox" 
                                                                        onclick="#"
                                                                        class="switch-input" checked>
                                                                    <span class="switch-toggle-slider">
                                                                        <span class="switch-on">
                                                                            <i class="ti ti-check"></i>
                                                                        </span>
                                                                        <span class="switch-off">
                                                                            <i class="ti ti-x"></i>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </label>                                                                                           
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                            }else{
                                                echo "<tr><td colspan='4' class='text-center'>Nenhum usuário cadastrado.</td></tr>";
                                            }
                                            mysqli_close($conn);                                            
                                            ?>

                                                <!-- Offcanvas de detalhes da usuário -->                                                                                           
                                        </tbody>
                                    </table>                                    
                                    <!-- Fim Paginação -->                                
                                </div>                                
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('conn.php');

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) {
    $id = intval($_GET['id']); // segurança contra injeção

    $sqlDelete = "DELETE FROM usuarios WHERE id = $id";
    if (mysqli_query($conn, $sqlDelete)) {
        echo "<script>alert('Usuário excluído com sucesso!');</script>";
        echo "<script>window.location='?page=list_usuarios';</script>"; // recarrega a página
    } else {
        echo "<script>alert('Erro ao excluir usuário!');</script>";
    }
}
?>