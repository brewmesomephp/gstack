<?php
parse_str(file_get_contents("php://input"),$post_vars);
echo $post_vars['value'];


?>