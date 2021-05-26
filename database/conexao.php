<?php

const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "Work@bench";
    const DATABASE = "dbTaskList";

    $conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_connect_error());