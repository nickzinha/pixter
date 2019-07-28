<?php include('_inc/header.inc.php'); ?>

<div class="container conteudo">
    <div class="row">
        <div class="col-md-12 title-pags text-center">
            <h1 class="cyan"><i class="fa fa-envelope-open-text"></i> NEWSLETTER</h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo URL_BASE; ?>" class="cyan">Home</a></li>
                <li class="active">Newsletter</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <form action="<?php echo URL_BASE ?>/api/SendContact" method="POST" id="formContato" name="contato">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Nome</span>
                            <input type="text" required name="nome" id="nome" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="email" required name="email" id="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea name="mensagem" id="mensagem" class="form-control" placeholder="Gostaria de nos deixar algum recado?"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 text-right">
                    <button type="submit" class="btn btn-contato">Enviar</button>
                </div>
            </form>
            <div class="col-md-12 col-xs-12">
                <div class="contact-notif"></div>
            </div>
        </div>
    </div>
</div>

<?php include('_inc/footer.inc.php'); ?>
