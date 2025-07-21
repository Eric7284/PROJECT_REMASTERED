<?php
session_start();
session_unset();
session_destroy();
header('Location: /PROJECT_REMASTERED/home');
exit;