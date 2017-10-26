<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/validator.js"></script>
    </head>
    <body>
        <?php echo form_open('account/dologin'); ?>

            <label for="username">User Name</label>
            <input type="input" name="username" data-validation="required" data-validation-help="user name required"/><br />

            <label for="password">Password</label>
            <input type="password" name="password"  data-validation="required" data-validation-help="password required"/><br />
            
            <input type="submit" name="submit" value="Login" />

        </form>
        
        <script type="text/javascript">
            $.validate();
        </script>            
    </body>
</html>
