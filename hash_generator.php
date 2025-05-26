<?php
echo "admin Hash: ". password_hash('admin123', PASSWORD_DEFAULT) . "<br>";
echo "student Hash: ". password_hash('student123', PASSWORD_DEFAULT);
?>