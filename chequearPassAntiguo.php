<?php
    if(!(password_verify($_POST['ing'], $_POST['r']) || $_POST['ing'] == $_POST['r'])){
    echo("El password no coincide con el real ");
};
?>