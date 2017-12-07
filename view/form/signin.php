<div class="r">
    <div class="g3"></div>
    <div class="g6">
        <h2>Entrar</h2>
        <form class="" action="/signin" method="post">
            <label for="email">
                <?php
                if (isset($error['invalid_email'])) {
                    print '<span style="color:red">Endereço de email inválido</span>';
                } else {
                    print 'Email';
                }
                ?>
            </label>
            <input type="email" name="email" id="email" required>
            <label for="password">
                <?php
                if (isset($error['invalid_password'])) {
                    print '<span style="color:red">Senha válida</span>';
                } else {
                    print 'Email';
                }
                ?>
            </label>
            <input type="password" name="password" id="password" required pattern=".{8,}" title="8 caracteres no mínimo">
            <button type="submit">Entrar</button>
            <script type="text/javascript">
            function defaultLabel(){
                $("label[for='email']").html('Email');
                $("label[for='password']").html('Senha');
            }
            $('#email').on('focus',function(){
                defaultLabel();
            });

            $('#password').on('focus',function(){
                defaultLabel();
            });

            </script>
        </form>
    </div>
    <div class="g3"></div>
</div>
