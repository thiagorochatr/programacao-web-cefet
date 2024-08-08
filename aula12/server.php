<ul>
<?php
foreach ( $_SERVER as $chave => $valor ) {
    echo "<li><h6>$chave</h6>$valor</li>";
}
?>
</ul>