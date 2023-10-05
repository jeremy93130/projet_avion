<?php
session_start();
session_destroy();
header('Location: http://localhost/projet_avion/views/connexion.php');