<?php
include 'conexao-banco.php';

// Adicionar tarefa
if (isset($_POST['add'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $con->query("INSERT INTO tarefas (titulo, descricao) VALUES ('$titulo', '$descricao')");
}

// Marcar concluída
if (isset($_GET['done'])) {
    $id = $_GET['done'];
    $con->query("UPDATE tarefas SET concluida=1 WHERE id=$id");
}

// Deletar tarefa
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $con->query("DELETE FROM tarefas WHERE id=$id");
}

$result = $con->query("SELECT * FROM tarefas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Tarefas</title>
</head>
<body>
    <h1>Minhas Tarefas</h1>

    <form method="post">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="descricao" placeholder="Descrição">
        <button type="submit" name="add">Adicionar</button>
    </form>

    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['titulo']; ?> - <?php echo $row['descricao']; ?>
                <?php if(!$row['concluida']): ?>
                    <a href="?done=<?php echo $row['id']; ?>">Concluir</a>
                <?php else: ?>
                    <strong>[Concluída]</strong>
                <?php endif; ?>
                <a href="?delete=<?php echo $row['id']; ?>">Excluir</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>