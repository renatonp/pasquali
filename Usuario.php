class Usuario(){
    public function conectarBanco(){
        $conexao = mysql_connect("127.0.0.1","teste","teste");
        mysql_select_db("APTTeste");
    }

    public function cadastrarUsuario($dados){
        $nome = $dados["nome"];
        $endereco = $dados["endereco"];
        $telefone = $dados["telefone"];

        $this->conectarBanco();
        mysql_query("INSERT INTO usuarios("'nome','endereco','telefone') VALUES('".$nome."','".$endereco."','".$telefone."')");
        mysql_close($conexao);
    }

    public function atualizarUsuario($dados){
        $id_usuario = $dados["id"];

        $this->conectarBanco();
        mysql_query("UPDATE FROM usuarios SET nome = '".$dados["nome"]."',endereco = '".$dados["endereco"]."',telefone = '".$dados["telefone"]."'");
        mysql_close($conexao);
    }

    public function removerUsuario($dados){
        $this->conectarBanco();
        mysql_query("DELETE FROM usuarios WHERE id = '".$dados["id"]."'");
        mysql_close($conexao);
    }

    public function listarUsuarios(){
        $this->conectarBanco();
        $query = mysql_query("SELECT * FROM usuarios");
        for($i=0; $i < mysql_num_rows($query); $i++){
            echo"<div class='row'>";
                echo"<div class='lg-4'>Nome</div>";
                echo"<div class='lg-4'>Endereço</div>";
                echo"<div class='lg-4'>Telefone</div>";
            echo"</div>";

            echo"<div class='row'>";
                echo"<div class='col-lg-4'>".$nome."</div>";
                echo"<div class='col-lg-4'>".$endereco."</div>";
                echo"<div class='col-lg-4'>".$telefone."</div>";
            echo"</div>";
        }
        mysql_close($conexao);
    }
}