<?php
        $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
        $connection->set_charset("utf8");
        mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
?>