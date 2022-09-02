<?php

$passwordHash = password_hash("test1234", PASSWORD_DEFAULT);
echo $passwordHash;