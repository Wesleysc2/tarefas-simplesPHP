# Cadastro de Tarefas - PHP + MySQL

Projeto simples de estudos com foco em PHP e MySQL.

## Funcionalidades
- Adicionar tarefas (título e descrição), listar tarefas, marcar tarefas como concluídas, deletar tarefas

## Banco de Dados
```sql
CREATE DATABASE tarefas_db;

USE tarefas_db;

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    concluida TINYINT(1) DEFAULT 0
);
