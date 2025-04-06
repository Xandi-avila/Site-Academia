<?php
require_once '../banco/conexao.php';
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['excluir'])) {
    $agendamento_id = $_GET['excluir'];

    $sqlDelete = "DELETE FROM agendamentos WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("i", $agendamento_id);
    if ($stmt->execute()) {
        header("Location: editar-agendamentos.php?sucesso=1");
        exit();
    } else {
        header("Location: editar-agendamentos.php?erro=1");
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $agendamento_id = $_POST['id'];
    $data_agendamento = $_POST['data'];
    $status = $_POST['status'];

    if (empty($data_agendamento) || empty($status)) {
        echo "<p class='alert alert-danger'>Por favor, preencha todos os campos.</p>";
    } else {
        $sqlUpdate = "UPDATE agendamentos SET data_agendamento = ?, status = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ssi", $data_agendamento, $status, $agendamento_id);

        if ($stmtUpdate->execute()) {
            echo "<p class='alert alert-success'>Agendamento atualizado com sucesso!</p>";
            header("Location: editar-agendamentos.php?sucesso=1");
            exit();
        } else {
            echo "<p class='alert alert-danger'>Erro ao atualizar o agendamento.</p>";
        }

        $stmtUpdate->close();
    }
}


$sql = "SELECT a.id, a.data_agendamento, a.status, u.nome AS nome_usuario, p.nome AS professor
        FROM agendamentos a
        JOIN usuarios u ON a.usuario_id = u.id
        JOIN professores p ON a.professor_id = p.id
        ORDER BY a.data_agendamento ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/administrativo.css">
    <link rel="stylesheet" href="../CSS/menu.css">
    <meta name="author" content="Mauricio T Welter">
    <title>Editar Agendamentos - Senac Boxe</title>
    <link rel="icon" href="../Imagens/logoMini.png" type="Logo">
</head>

<body>

    <!-- Cabeçalho -->
    <?php require('headeradm.php'); ?>

    <main class="container">
        <h1 class="mt-4">Editar Agendamentos</h1>
        <?php
        if (isset($_GET['sucesso'])) {
            echo "<p class='alert alert-success'>Agendamento excluído com sucesso!</p>";
        }
        if (isset($_GET['erro'])) {
            echo "<p class='alert alert-danger'>Erro ao excluir o agendamento.</p>";
        }
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data do Agendamento</th>
                    <th>Professor</th>
                    <th>Nome do Usuário</th> <!-- Coluna para mostrar o nome do usuário -->
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($agendamento = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo date('d/m/Y H:i', strtotime($agendamento['data_agendamento'])); ?></td>
                        <td><?php echo $agendamento['professor']; ?></td>
                        <td><?php echo $agendamento['nome_usuario']; ?></td> <!-- Nome do usuário -->
                        <td><?php echo ucfirst($agendamento['status']); ?></td>
                        <td>
                            <a href="editar-agendamentos.php?id=<?php echo $agendamento['id']; ?>" class="btn btn-warning">Editar</a>
                            <a href="editar-agendamentos.php?excluir=<?php echo $agendamento['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este agendamento?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <?php if (isset($_GET['id'])): ?>
            <?php
            $agendamento_id = $_GET['id'];

            $sqlEdit = "SELECT a.id, a.data_agendamento, a.status, a.professor_id, p.nome AS professor
                        FROM agendamentos a
                        JOIN professores p ON a.professor_id = p.id
                        WHERE a.id = ?";
            $stmt = $conn->prepare($sqlEdit);
            $stmt->bind_param("i", $agendamento_id);
            $stmt->execute();
            $resultEdit = $stmt->get_result();
            $agendamento = $resultEdit->fetch_assoc();
            ?>

            <h2>Editar Agendamento</h2>
            <form action="editar-agendamentos.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $agendamento['id']; ?>">
                <div class="mb-3">
                    <label for="data" class="form-label">Data do Agendamento:</label>
                    <input type="datetime-local" id="data" name="data" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($agendamento['data_agendamento'])); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="pendente" <?php echo ($agendamento['status'] == 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                        <option value="confirmado" <?php echo ($agendamento['status'] == 'confirmado') ? 'selected' : ''; ?>>Confirmado</option>
                        <option value="cancelado" <?php echo ($agendamento['status'] == 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
            </form>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php require('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
