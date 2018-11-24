<?php
header('Content-Type: text/html; charset=utf-8');
if(!session_id()) {
    session_start();
}

#unset($_SESSION['facebook_access_token']);exit;

if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off'):
  $protocolo = 'http://';
else:
  $protocolo = 'https://';
endif;

$super_url = $protocolo . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);

require 'Facebook/autoload.php';
include('config.php');



$fb = new Facebook\Facebook([
  'app_id' => '217546225675050',
  'app_secret' => '485f5bedd696b49d4c2d0ca76bd22b60',
  'default_graph_version' => 'v3.2',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];
$loginUrl = $helper->getLoginUrl($super_url . '/callback.php', $permissions);


include '_inc/header.php'; ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-4">Auto Post Facebook</h2>
            
            <?php
            if(isset($_SESSION['facebook_access_token'])):
              $fb->setDefaultAccessToken( $_SESSION['facebook_access_token'] );
            ?>
           
            <div class='row'>
              <div class="col-md-12 col-md-offset-1">
                <p>Você esta <span style="color:green">conectado</span></p>
                <p>Seu Token atual: <b><i style="font-size: 0.8em"><?=$_SESSION['facebook_access_token']?></i></b></p>
              </div>

              <div class="col-md-8 col-md-offset-1">
                <h2 class="mt-4">Suas Páginas</h2>
                <p>

                <?php
                  $response = $fb->get('/me/accounts');
                  foreach ($response->getDecodedBody() as $allAccounts) {
                      foreach ($allAccounts as $account ) { 
                        if(isset($account['id'])){
                             echo '<p style="color:green;"><b>'.$account['name'].'</b> (<span style="color:#777;"><b>$page_id='.$account['id'].';</span>)</b>  </p>'; 
                        }
                      }
                  }
                ?>

              </div>
              <div class="col-md-4 col-md-offset-1">
                <h2 class="mt-4">Publique um post</h2>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                  Clique aqui para publicar
                </button>
                <p>
                  <?php
                  if($_POST):
                    require 'AutoPostFacebook.class.php';
                    $PostFB = new AutoPostFacebook;
                    $Data = ['post_title' => $_POST['title'], 'post_link' => $_POST['url'],'page_id'=> $_POST['pages']];

                    if($PostFB->AutoPost($Data)):
                      echo "<div class='alert alert-success'>Publicação Realizada com Sucesso</div>";
                    else:
                      echo "<div class='alert alert-danger'>Erro ao realizar a Publicação</div>";
                    endif;

                  endif;
                  ?>
               <!--modal-->
               <form method="post">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title pull-left" id="myModalLabel">Auto Post Facebook</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <?php
                            $response = $fb->get('/me/accounts');
                            echo "<select class='form-control' name='pages' required>";
                            foreach ($response->getDecodedBody() as $allAccounts):
                                foreach ($allAccounts as $account ):
                                  if(isset($account['id'])):
                                       echo '<option value='.$account['id'].'>'.$account['name'].'</option>'; 
                                  endif;
                                endforeach;
                            endforeach;
                            echo "</select>"
                          ?>
                          <input type="text" name="title" class="form-control" placeholder="Titulo da Postagem" required="">
                          <input type="text" name="url" class="form-control" placeholder="URL da Postagem" value="" required="">
                      </div>
                      <div class="modal-footer">
                        <button type="buuton" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">publicar</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <!--fim do modal-->


              </div>
            </div>
            <?php else: ?>
            <p>É necessario esta logado com o facebook, clique no botao abaixo para logar</p>
            <p>
              <a class="btn btn-primary btn-lg" href="<?=$loginUrl ?>">Login com Facebook &raquo;</a>
            </p>
          <?php endif; ?>
        </div>
    </div>
  </div>

    
    
<?php include '_inc/footer.php'; ?>