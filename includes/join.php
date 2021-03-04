<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="join-bar"> 
		<a href="logout.php" class="signup"><button id="br" ><?php echo $_SESSION['user']['username'] ?> <hr> logout</button></a>		
	</div>
<?php }else{ ?>
	<div class="join-bar"> 
		<a href="joinnew.php" target="_blank" class="signup"><button id="br" >Join Us</button></a>  
	</div>
<?php } ?>


