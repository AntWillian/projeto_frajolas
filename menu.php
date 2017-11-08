<?php

if(isset($_POST['btOk'])){
  $login =  $_POST['txtUsuario'];
  $senha =  $_POST['txtsenha'];

  $sql = 'select * from tblcadastro_usuario where usuario = "'.$login.'" and senha = "'. $senha.'" ';
  $select = mysql_query($sql);

  echo "echo <script>
      alert('Usuario ou senha invalidos');
      window.history.go(-1);

      </script>";

  if(mysql_affected_rows() > 0){
    while($rs = mysql_fetch_array($select)){
      $nome = $rs['usuario'];
      $_SESSION['usuario'] = $rs['usuario'];
      $_SESSION['txtUsuario'] = $_POST['txtUsuario'];
      header('location:cms/home_cms.php');
    }
  }
}

 ?>


<nav id="menu_empresarial">
  <div id="conteudo_menu_empresarial">

    <ul id="menuNav_empresarial">

      <li><a href="sobre_nos.php">
        Frajola's <sup>®</sup>
      </a></li>
      <li><a href="curiosidades60_70_80.php">Curiosidades anos 60 70 e 80</a></li>
      <li><a href="fale_conosco.php">Fale Conosco</a></li>

    </ul>

  </div>

</nav>

  <header id="menu_principal">



      <nav id="conteudo_menu">
        <div id="margin_logo">


          <div id="logo_principal">
              <img src="images/logoFrajola.png" alt="">
          </div>

        </div>

        <ul id="menuNav">

          <li><a href="promocoes.php">
            <span class="menuItem_pequeno">Nossas</span>
            <span class="menuItem_grande">Promoções</span>
          </a></li>
          <li><a href="pizzadomes.php">
            <span class="menuItem_pequeno">Pizza</span>
            <span class="menuItem_grande">Do Mês</span>
          </a></li>
          <li><a href="ambientes.php">
            <span class="menuItem_pequeno">Nossos  </span>
            <span class="menuItem_grande">Ambientes</span>
          </a></li>
          <li><a href="home.php">
            <span class="menuItem_pequeno">Novas</span>
            <span class="menuItem_grande">Ofertas</span>
          </a></li>

        </ul>
        <form class="frm_login" action="home.php" method="post">
          <div id="login">

            <div class="dados">
              Usuario:  <br><input placeholder="Usuario" class="dados_entarda" type="text" name="txtUsuario" value="">

            </div>

            <div class="dados">
              Senha: <br><input  placeholder="Senha" class="dados_entarda" type="password" name="txtsenha" value="">
            </div>

            <div class="botao">

                <input  id="enviar_dados" type="submit" name="btOk" value="Entrar">


            </div>

          </div>

        </form>

      </nav>

  </header>
