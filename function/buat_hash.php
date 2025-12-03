<?php
$hash = password_hash("admin123", PASSWORD_DEFAULT);
echo "<textarea cols='80' rows='5'>$hash</textarea>";
