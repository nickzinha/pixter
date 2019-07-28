<footer>
    <div class="container-fluid">
        <div class="row row-footer">
            <div class="container">
                <div class="col col-md-12 col-lg-12 col-12">
                    <a href="<?php echo URL_BASE ?>">
                    </a>
                    <div class="titulo-footer text-center">
                        <p>Keep in touch with us</p>
                    </div>
                    <div class="sub-title text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac blandit arcu. Quisque pretium, est a egestas congue, lacus justo sodales est, ac pulvinar nisl dolor a est. Etiam fringilla dui et est elementum molestie. Pellentesque at lectus quis ipsum porttitor tristique nec non tellus. Curabitur vel commodo dui, malesuada porta enim.</p>
                    </div>
                    <br/>
                    <div class="col-md-12 text-center">
                        <form action="<?php echo URL_BASE ?>/api/SendFooter" method="POST" id="formEmail" name="email">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email to update">
                                    <span class="input-group-btn">
                                     <button class="btn btn-default botao-submit" type="submit">SUBMIT</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="redes-sociais text-center">
                        <a class="logo" target="_blank" href="https://www.facebook.com">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="logo" target="_blank" href="https://twitter.com">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                        <a class="logo" target="_blank" href="https://www.google.com/">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <a class="logo" target="_blank" href="https://br.pinterest.com/">
                            <i class="fab fa-pinterest-square"></i>
                        </a>
                    </div>
                    <br>
                    <div class="col-md-10 col-md-offset-2 enderecos">
                        <div class="col-md-2 sp">
                            <span>Alameda Santos, 1978 6th floor - Jardim Paulista São Paulo – SP</span>
                        </div>
                        <div class="col-md-2 london">
                            <span>London – UK 125 Kingsway London WC2B 6NH</span>
                        </div>
                        <div class="col-md-2 portugal">
                            <span>Lisbon – Portugal Rua Rodrigues Faria, 103 4th floor Lisbon – P</span>
                        </div>
                        <div class="col-md-2 curitiba">
                            <span>Curitiba – PR  R. Francisco Rocha, 198 Batel – Curitiba – PR</span>
                        </div>
                        <div class="col-md-2 argentina">
                            <span>Buenos Aires – Argentina Esmeralda 950 Buenos Aires B C1007</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>




<script src="<?php echo URL_BASE; ?>/js/plugins.js" type="text/javascript"></script>
<script src="<?php echo URL_BASE; ?>/js/app.js" type="text/javascript"></script>
</body>
</html>