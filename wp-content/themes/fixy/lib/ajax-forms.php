<?php //Ajax Login & Contact forms rendering ?>

<form id="ajax-login" action="login" method="post">
	<div class="form-inner">
		<a class="ajax-close" title="close"><?php echo __('close','fixy'); ?><i class="icon-cancel"></i></a>
		<ul>
			<li><p class="ajax-status"></p></li>
			<li><i class="icon-user"></i><?php echo __('Username','fixy'); ?></li>
			<li><input id="username" type="text" name="username" ></li>
			<li><i class="icon-lock"></i><?php echo __('Password','fixy'); ?></li><li><input id="password" type="password" name="password" ></li>
			<li><a class="ajax-lost" title="Lost Password" href="<?php echo wp_lostpassword_url(); ?>"><?php echo __('Lost your password?','fixy'); ?></a></li>
			<li><input class="ajax-submit-button" type="submit" value="<?php echo __('Login','fixy'); ?>" name="submit"></li>
			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
		</ul>
	</div>
</form>

<?php //End ?>