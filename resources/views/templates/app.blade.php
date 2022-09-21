<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/projeto/app.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-dark d-flex" style="background-color: #0D2579">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <ul class="nav navbar-nav me-auto mb-2 mb-lg-0">
            <a href="#" type="button" style="color: white;text-decoration: none; margin-left: 50px">
              TJDV - Programas Acadêmicos
            </a>
          </ul>
        </div>
      </nav>
      
      <div class="collapse" id="navbarToggleExternalContent" style="background-color: #0D2579; width: 110px; text-color: white; float: left;">
        <nav id="navbar-exemplo3" class="navbar">
          <a class="navbar-brand" style="color:white;" href="#">Menu</a>
          <nav class="nav flex-column">
            <a class="nav-link" style="color:white;" href="#item-1">Alunos</a>
            <a class="nav-link" style="color:white;" href="#item-2">Professores</a>
            <a class="nav-link" style="color:white;" href="#item-3">Servidores</a>
            <a class="nav-link" style="color:white;" href="#item-3">Vínculos</a>
            <hr style="color:white; width: 100%">
            <a class="nav-link" style="color:white;" href="#item-3">Usuário</a>
            <a class="nav-link" style="color:white;" href="#item-3">Logout</a>
          </nav>
        </nav>
      </div>
    </header>

    <div>
      <div style="text-align: center">  
        @yield('body')
      </div>
    </div>

    <footer class="bg-light footer-card" style="margin-top: 0px;">
      <div class="text-center" style="padding-bottom: 20px">
        <label style="font-size: 10px;">Desenvolvido por:</label><br/>
        <strong><label style="font-size: 20px; font-family: fantasy;">TJDV</label></strong>
      </div>
    </footer>
  </body>
</html>