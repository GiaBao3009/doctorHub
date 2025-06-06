<?php
for ($i = 1; $i <= 50; $i++) {
    $name = "User $i";
    $email = "user$i@example.com";
    $password = password_hash("password$i", PASSWORD_DEFAULT);
    $role = 'user';

    echo "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role');\n";
}
