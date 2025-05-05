<?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!$socket) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error()) . "\n";
    exit(1);
}

$result = socket_bind($socket, 'localhost', 9001);
if (!$result) {
    echo "Failed to bind socket: " . socket_strerror(socket_last_error()) . "\n";
    exit(1);
}

echo "Successfully bound to port 9001\n";
socket_close($socket);
?>
