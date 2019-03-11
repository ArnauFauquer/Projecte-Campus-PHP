<?php

session_start();// activar el sistema de sesiones
                // y debe de ser la primera instrucción del php

session_destroy(); // destruir la sesion

header("location:login.html"); // redireccionamos a la página de inicio


?>