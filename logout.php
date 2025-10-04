<?php
session_start();
session_unset();
session_destroy();
header("Location: login/index.html?erro=logout");
exit;
