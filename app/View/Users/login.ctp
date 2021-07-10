<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8"/>
        <title>Cẩm nang đi làm | Log in</title>
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport"/>
        <!-- bootstrap 3.0.2 -->
        <?php
            echo $this->Html->css(array(
            	"bootstrap.min.css"
            	,"font-awesome.min.css"
            	,"AdminLTE.css"
            ));
        ?>
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <!-- <form action="index.html" method="post"> -->
            <?php echo $this->Form->create(); ?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <!-- <input type="text" name="userid" class="form-control" placeholder="User ID"/> -->
                        <?php 
                        	echo $this->Form->input('username',array('class'=>'form-control','placeholder'=>'User ID'));
                        ?>
                    </div>
                    <div class="form-group">
                        <!-- <input type="password" name="password" class="form-control" placeholder="Password"/> -->
                         <?php 
                         	echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','placeholder'=>'Password'));
                         ?>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/><span style="margin-left:5px;">Remember me</span>
                    </div>
                </div>
                <div class="footer">
                    <!-- <button type="submit" class="btn bg-olive btn-block">Sign me in</button> -->
                    <?php 
                    	echo $this->Form->button('Sign me in',array('type'=>'submit','class'=>'btn bg-olive btn-block'));
                    ?>
                </div>
            <!-- </form> -->
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>