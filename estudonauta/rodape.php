<?php
    echo "<footer>";
    echo "<p>Acessado por ". $_SERVER['REMOTE_ADDR'] ." em ".date('d/M/Y')."</p>";
    echo "<p>Desenvolvido por Estudonauta &copy; 2021</p>";
    echo "</footer>";
    $banco->close();