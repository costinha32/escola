
<?php
    include("conexao.php");

    if (isset($_POST['btnApagar']))
    {
        $apagar = $_POST['btnApagar'];
        $sql_code ="DELETE FROM disciplina WHERE idDisciplina = '$apagar'"; 
        $sql_query = $con ->query($sql_code);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISCIPLINAS</title>
    <style>
    body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-aling: center;
        }
        a {
            font-size: 20px;
            color: white;
        }
        a:hover {
            color: blue;
        }
        table {
            background-color: rgba(0, 0, 0, .3);
            font-family: 'Roboto', sans-serif;
            border-radius: 15px 15px 0 0;   
            align-items: center;
            border: 1px;
            border-right: none;
            border-left: none;
            gap: .1%;
        }
        table tr th{
            border: none;
            border-right: 1px;

        }
        table tr td{
            border-right: none;
            border-left: none;
            border-top: none;
        }
        .btnBuscar{
            margin: 1px;
            padding: 2px;
            border-radius: 2px;
        }
        .inputBuscar {
            margin: 1px;
            padding: 2px;
            border-radius: 2px;
        }
    </style>

</head>
<body>
   LISTA DE DISCIPLINAS
   
<form action="" method="POST">
    <input class = "inputBuscar" type="text" name="txtBuscar" placeholder="Digite um nome...">
    <button class = "btnBuscar" type="submit" name="btnBuscar" id="btnBuscar">Buscar</button>
</form>

    <form action="" method = "POST">

    <table border= "2px">
        <tr>
            <th>#</th>
            <th>nome</th>
            <th>Carga horária</th>
            <th>Livro</th>
            <th>Apagar</th>
        </tr>
   
    <?php
     if(isset($_POST['btnBuscar'])){
        $pesquisa = $_POST['txtBuscar'];
        $sql_code = "SELECT * FROM disciplina WHERE nomeDisciplina like'%$pesquisa%'"; 
        echo "funciona";
    }else{$sql_code = "SELECT * FROM disciplina WHERE nomeDisciplina";
    }
   
    $sql_query = $con ->query($sql_code);
    while($dados = $sql_query->fetch_assoc()) {
    ?>

        <tr>
            <td><?php echo $dados['idDisciplina']; ?></td>
            <td><?php echo $dados['nomeDisciplina']; ?></td>
            <td><?php echo $dados['cargaHoraria']; ?></td>
           <td><?php echo $dados['livro']; ?></td>
           <td> 
           
            <center>
            <button type="submit" name="btnApagar" value = "<?php echo $dados['idDisciplina']; ?>"> 
                <img src="trashIcon.png" width="20px" height="20px" aling="center">
            </button>
            </center>
        </tr>
        <?php }?>
        </form>
    </table>

    <a href="index.php">Home</a>

    <form action="" method="POST">
    <input type="text" name="txtNome" placeholder="Digite o nome da disciplina">
    <input type="text" name="txtCarga" placeholder="Digite a carga horária">
    <input type="text" name="txtLivro" placeholder="Digite o nome do livro utilizado">
    <button type="submit" name="btnInserir" id="btnInserir">Inserir</button>
</form>

    <form action="" method = "POST">
   
    <?php
     if(isset($_POST['btnInserir'])){
        $sql_code = "INSERT INTO disciplina(nomeDisciplina, cargaHoraria, livro) VALUES('" . $_POST['txtNome']. "','". $_POST['txtCarga']. 
        "','". $_POST['txtLivro']. "')"; 
    }
    while($dados = $sql_query->fetch_assoc()) {
    ?>
        <?php }?>
        </form>

</body>
</html>