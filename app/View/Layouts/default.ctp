<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- <?php echo $this->Html->charset(); ?> -->
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $this->fetch('title'); ?>
		</title>

		<!-- popper cdn -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

		<?php
			// echo $this->Html->meta('icon');

			echo $this->Html->css('cake.generic');

			// echo $this->fetch('meta');
			// echo $this->fetch('css');
			// echo $this->fetch('script');

			//jquery
			echo $this->Html->script('../vendors/jquery/jquery-3.7.0.min.js');
			//jquery

			//bootstrap
			echo $this->Html->css('../vendors/bootstrap-4.6.2/css/bootstrap.min.css');
			echo $this->Html->script('../vendors/bootstrap-4.6.2/js/bootstrap.min.js');
			//bootstrap

			//font awesome
			echo $this->Html->css('../vendors/fontawesome-free-6.4.0-web/css/all.min.css');

			//style
			echo $this->Html->css('styles.css');

			//spinner
			echo $this->Html->css('loadingSpinner.css');
		?>
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="<?=$this->Html->url(['controller'=>'posts', 'action'=>'index'])?>"><i class="fa-solid fa-house"></i>&nbsp;Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class = "nav-link" href = "<?=$this->Html->url(['controller'=>'posts','action'=>'index'])?>"><i class="fa-solid fa-rss"></i>&nbsp;Posts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=$this->html->url(['controller'=>'chats','action'=>'index'])?>"><i class="fa-regular fa-comment"></i>&nbsp;Chat</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=$this->html->url(['controller'=>'users','action'=>'index'])?>"><i class="fa-solid fa-users"></i>&nbsp;Users</a>
					</li>
				</ul>
				<ul class = "navbar-nav">
					<?php
						if($logged_in){
							echo '<a class = "nav-link btn btn-default" href="' . $this->Html->url(['controller'=>'users','action'=>'logout']) .'">Logout</a>';
						}else{
							echo '<a class = "nav-link btn btn-default" href="' . $this->Html->url(['controller'=>'users','action'=>'login']) .'">Login</a>';
						}
					?>
				</ul>
			</div>
		</nav>

		<div class="container pt-2">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
			
		</div>

		<!-- this is for loading modal form -->    
		<div id="loadingModal_id" style="display: none;">
				<div class="block-bg"></div>
					<div class="loading-bg">
						<div>
							<div class="row">
								<div id="loader">
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>
									<div class="dot"></div>

								<div class="lading"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- this is for loading modal form -->
			
			
			<!-- modal container -->
			<div id="myModal_id" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div id = "myModal_Content_id" class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

				
				</div>
			</div>
			<!-- modal container -->
	</body>
</html>
