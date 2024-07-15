<?php

session_start();

session_destroy();

header("Location: tindex.php");
exit;