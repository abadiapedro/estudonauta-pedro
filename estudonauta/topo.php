<?php
echo "<p class = 'pequeno'>";
if (empty($_SESSION['user'])) {
    echo "<a href='user-login.php'>Entrar</a>";
} else {
    echo "Olá, <strong>" . $_SESSION['nome'] . "</strong> | ";
    echo "<a href='user-edit.php'>Meus Dados</a> | ";
    if (is_admin()){
        echo "<a href='user-new.php'>Novo Usuário</a> | ";
        echo "Novo Jogo | ";
    }
    echo "<a href='user-logout.php'>Sair</a>";
}
echo "</p>";
