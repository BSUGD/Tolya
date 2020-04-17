<?php

copy('https://getcomposer.org/installer', __DIR__ . '/composer-setup.php');
if (hash_file('sha384', __DIR__ . '/composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a')
{
	echo 'Installer verified' . PHP_EOL;
}
else {
	echo 'Installer corrupt' . PHP_EOL;
	unlink(__DIR__ . '/composer-setup.php');
}

shell_exec(PHP_BINARY . ' ' . __DIR__ . '/composer-setup.php');
unlink(__DIR__ . '/composer-setup.php');

if(file_exists(__DIR__ . '/composer.phar')) {
	shell_exec(PHP_BINARY . ' composer.phar install');
	shell_exec(PHP_BINARY . ' autoload.php');
}

mkdir(__DIR__ . '/log');
$version = trim(shell_exec('git symbolic-ref --short -q HEAD'));
file_put_contents(__DIR__ . "/version", $version);
echo "Version " . $version . " is built";

?>
