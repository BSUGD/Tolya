<?php
$version = trim(shell_exec('git symbolic-ref --short -q HEAD'));
file_put_contents("version", $version);
shell_exec('git clone https://725c98063a358e99b9478da41f5600e7a3ff4859@github.com/rok9ru/trpo-core.git core');
?>