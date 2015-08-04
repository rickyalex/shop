<?php
if($cat=='' && $brand=='') $mode='all';
else if($cat=='') $mode='brand';
else if ($brand=='') $mode='cat';

if($mode=='cat'){
	if($cat=='all'){
		if($id=='all'){
			while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				$x++; 
			}
		}
		else{
			$rs = $mysqli->query("SELECT * FROM items where id='$id'") or die(mysql_error());
				$i=0;
				$array=Array();
				while($row = $rs->fetch_array(MYSQLI_ASSOC))
				{
					$array[$i]['description'] = $row['description'];
					$array[$i]['brand'] = $row['brand'];
					$array[$i]['price'] = $row['price'];
					$category = $array[$i]['category'] = $row['category'];
					$array[$i]['active'] = $row['active'];
					$array[$i]['img'] = $row['img'];
					$array[$i]['flag_featured'] = $row['flag_featured'];
					$array[$i]['gender'] = $row['gender'];
					$array[$i]['color'] = $row['color'];
					$array[$i]['size'] = $row['size'];
					$i++;
				}
			$x=0;
			?>
			<div class="cl">&nbsp;</div>
				<ul>
					<li id="zoom" class="detail">
						<img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" />
						<span class="desc">
							<h3><?php echo $array[$x]['brand']; ?></h3><br />
							<div class="product-desc">
								<h2><?php echo $array[$x]['description']; ?></h2><br />
								<h4><?php echo $array[$x]['category'].", ".$array[$x]['gender']; ?></h4><br />
								<h4><?php echo $array[$x]['color'].", Available Size : ".$array[$x]['size']; ?></h4><br />
								
							<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong><br>
							<span class="order-info">
								Untuk memesan barang ini, silahkan hubungi melalui cara berikut :<br>
								<strong>BBM: 48B45A1</strong><br>
								<strong>SMS : +62 8123456789</strong><br>
							</span>
						</span>
					</li>
				</ul>
			<div class="cl">&nbsp;</div><br>
			<h2>Produk Seperti Ini</h2><br>	
			<?php
			$rs = $mysqli->query("SELECT * FROM items where category='$category' and id!='$id' order by date_created desc limit 3") or die(mysql_error());
				$i=0;
				$array=Array();
				while($row = $rs->fetch_array(MYSQLI_ASSOC))
				{
					$array[$i]['id'] = $row['id'];
					$array[$i]['description'] = $row['description'];
					$array[$i]['brand'] = $row['brand'];
					$array[$i]['price'] = $row['price'];
					$array[$i]['category'] = $row['category'];
					$array[$i]['active'] = $row['active'];
					$array[$i]['img'] = $row['img'];
					$array[$i]['flag_featured'] = $row['flag_featured'];
					$array[$i]['gender'] = $row['gender'];
					$array[$i]['color'] = $row['color'];
					$array[$i]['size'] = $row['size'];
					$i++;
				}
			while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
				}
				$x++; 
			}
		}
	}
	else{
		$sql="SELECT * FROM items where category='$cat'";
		$rs = $mysqli->query($sql) or die(mysql_error());
			$i=0;
			$array=Array();
			while($row = $rs->fetch_array(MYSQLI_ASSOC))
			{
				$array[$i]['id'] = $row['id'];
				$array[$i]['description'] = $row['description'];
				$array[$i]['brand'] = $row['brand'];
				$array[$i]['price'] = $row['price'];
				$array[$i]['category'] = $row['category'];
				$array[$i]['active'] = $row['active'];
				$array[$i]['img'] = $row['img'];
				$array[$i]['flag_featured'] = $row['flag_featured'];
				$array[$i]['gender'] = $row['gender'];
				$array[$i]['color'] = $row['color'];
				$array[$i]['size'] = $row['size'];
				$i++;
			}
		$x=0;
		while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				$x++; 
			}
	}
}
else if($mode=='brand'){
	if($brand=='all'){
		if($id=='all'){
			while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				$x++; 
			}
		}
		else{
			$rs = $mysqli->query("SELECT * FROM items where id='$id'") or die(mysql_error());
				$i=0;
				$array=Array();
				while($row = $rs->fetch_array(MYSQLI_ASSOC))
				{
					$array[$i]['description'] = $row['description'];
					$array[$i]['brand'] = $row['brand'];
					$array[$i]['price'] = $row['price'];
					$category = $array[$i]['category'] = $row['category'];
					$array[$i]['active'] = $row['active'];
					$array[$i]['img'] = $row['img'];
					$array[$i]['flag_featured'] = $row['flag_featured'];
					$array[$i]['gender'] = $row['gender'];
					$array[$i]['color'] = $row['color'];
					$array[$i]['size'] = $row['size'];
					$i++;
				}
			$x=0;
			?>
			<div class="cl">&nbsp;</div>
				<ul>
					<li id="zoom" class="detail">
						<img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" />
						<span class="desc">
							<h3><?php echo $array[$x]['brand']; ?></h3><br />
							<div class="product-desc">
								<h2><?php echo $array[$x]['description']; ?></h2><br />
								<h4><?php echo $array[$x]['category'].", ".$array[$x]['gender']; ?></h4><br />
								<h4><?php echo $array[$x]['color'].", Available Size : ".$array[$x]['size']; ?></h4><br />
								
							<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong><br>
							<span class="order-info">
								Untuk memesan barang ini, silahkan hubungi melalui cara berikut :<br>
								<strong>BBM: 48B45A1</strong><br>
								<strong>SMS : +62 8123456789</strong><br>
							</span>
						</span>
					</li>
				</ul>
			<div class="cl">&nbsp;</div><br>
			<h2>Produk Seperti Ini</h2><br>	
			<?php
			$rs = $mysqli->query("SELECT * FROM items where category='$category' and id!='$id' order by date_created desc limit 3") or die(mysql_error());
				$i=0;
				$array=Array();
				while($row = $rs->fetch_array(MYSQLI_ASSOC))
				{
					$array[$i]['id'] = $row['id'];
					$array[$i]['description'] = $row['description'];
					$array[$i]['brand'] = $row['brand'];
					$array[$i]['price'] = $row['price'];
					$array[$i]['category'] = $row['category'];
					$array[$i]['active'] = $row['active'];
					$array[$i]['img'] = $row['img'];
					$array[$i]['flag_featured'] = $row['flag_featured'];
					$array[$i]['gender'] = $row['gender'];
					$array[$i]['color'] = $row['color'];
					$array[$i]['size'] = $row['size'];
					$i++;
				}
			while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul><br>
					<?php
						}
				}
				$x++; 
			}
		}
	}
	else{
		$sql="SELECT * FROM items where brand='$brand'";
		$rs = $mysqli->query($sql) or die(mysql_error());
			$i=0;
			$array=Array();
			while($row = $rs->fetch_array(MYSQLI_ASSOC))
			{
				$array[$i]['id'] = $row['id'];
				$array[$i]['description'] = $row['description'];
				$array[$i]['brand'] = $row['brand'];
				$array[$i]['price'] = $row['price'];
				$array[$i]['category'] = $row['category'];
				$array[$i]['active'] = $row['active'];
				$array[$i]['img'] = $row['img'];
				$array[$i]['flag_featured'] = $row['flag_featured'];
				$array[$i]['gender'] = $row['gender'];
				$array[$i]['color'] = $row['color'];
				$array[$i]['size'] = $row['size'];
				$i++;
			}
		$x=0;
		while($x < count($array)) {
				if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
					?>
					<li class="last">
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
					
				}
				else if($x==0){ //if it's the first row (odd)
					?>
					<div class="cl">&nbsp;</div>
					<ul>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				else if(($x % 2)==1){ //even rows
					?>
						<li>
							<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<div class="product-info">
								<h3><?php echo $array[$x]['brand']; ?></h3>
								<div class="product-desc">
									<p><?php echo $array[$x]['description']; ?><br /></p>
									<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
								</div>
							</div>
						</li>
					
					<?php
						if($x==count($array)+1){
					?>
					</li>
					</ul>
					<?php
						}
				}
				$x++; 
			}
	}
}
else{
	if($id=='all'){
		while($x < count($array)) {
			if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
				?>
				<li class="last">
					<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
					<div class="product-info">
						<h3><?php echo $array[$x]['brand']; ?></h3>
						<div class="product-desc">
							<p><?php echo $array[$x]['description']; ?><br /></p>
							<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
						</div>
					</div>
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul>
				<?php
					}
				
			}
			else if($x==0){ //if it's the first row (odd)
				?>
				<div class="cl">&nbsp;</div>
				<ul>
					<li>
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					</li>
				
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul>
				<?php
					}
			}
			else if(($x % 2)==1){ //even rows
				?>
					<li>
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					</li>
				
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul>
				<?php
					}
			}
			$x++; 
		}
	}
	else{
		$rs = $mysqli->query("SELECT * FROM items where id='$id'") or die(mysql_error());
			$i=0;
			$array=Array();
			while($row = $rs->fetch_array(MYSQLI_ASSOC))
			{
				$array[$i]['description'] = $row['description'];
				$array[$i]['brand'] = $row['brand'];
				$array[$i]['price'] = $row['price'];
				$category = $array[$i]['category'] = $row['category'];
				$array[$i]['active'] = $row['active'];
				$array[$i]['img'] = $row['img'];
				$array[$i]['flag_featured'] = $row['flag_featured'];
				$array[$i]['gender'] = $row['gender'];
				$array[$i]['color'] = $row['color'];
				$array[$i]['size'] = $row['size'];
				$i++;
			}
		$x=0;
		?>
		<div class="cl">&nbsp;</div>
			<ul>
				<li id="zoom" class="detail">
					<img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" />
					<span class="desc">
						<h3><?php echo $array[$x]['brand']; ?></h3><br />
						<div class="product-desc">
							<h2><?php echo $array[$x]['description']; ?></h2><br />
							<h4><?php echo $array[$x]['category'].", ".$array[$x]['gender']; ?></h4><br />
							<h4><?php echo $array[$x]['color'].", Available Size : ".$array[$x]['size']; ?></h4><br />
							
						<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong><br>
						<span class="order-info">
							Untuk memesan barang ini, silahkan hubungi melalui cara berikut :<br>
							<strong>BBM: 48B45A1</strong><br>
							<strong>SMS : +62 8123456789</strong><br>
						</span>
					</span>
				</li>
			</ul>
		<div class="cl">&nbsp;</div><br>
		<h2>Produk Seperti Ini</h2><br>	
		<?php
		$rs = $mysqli->query("SELECT * FROM items where category='$category' and id!='$id' order by date_created desc limit 3") or die(mysql_error());
			$i=0;
			$array=Array();
			while($row = $rs->fetch_array(MYSQLI_ASSOC))
			{
				$array[$i]['id'] = $row['id'];
				$array[$i]['description'] = $row['description'];
				$array[$i]['brand'] = $row['brand'];
				$array[$i]['price'] = $row['price'];
				$array[$i]['category'] = $row['category'];
				$array[$i]['active'] = $row['active'];
				$array[$i]['img'] = $row['img'];
				$array[$i]['flag_featured'] = $row['flag_featured'];
				$array[$i]['gender'] = $row['gender'];
				$array[$i]['color'] = $row['color'];
				$array[$i]['size'] = $row['size'];
				$i++;
			}
		while($x < count($array)) {
			if($x!=0 && ($x % 2)==0){ //if the row is a multiplier of 3 (odd)
				?>
				<li class="last">
					<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
					<div class="product-info">
						<h3><?php echo $array[$x]['brand']; ?></h3>
						<div class="product-desc">
							<p><?php echo $array[$x]['description']; ?><br /></p>
							<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
						</div>
					</div>
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul><br>
				<?php
					}
				
			}
			else if($x==0){ //if it's the first row (odd)
				?>
				<div class="cl">&nbsp;</div>
				<ul>
					<li>
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					</li>
				
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul><br>
				<?php
					}
			}
			else if(($x % 2)==1){ //even rows
				?>
					<li>
						<a href="products.php?id=<?php echo $array[$x]['id']; ?>"><img class="resize" src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
						<div class="product-info">
							<h3><?php echo $array[$x]['brand']; ?></h3>
							<div class="product-desc">
								<p><?php echo $array[$x]['description']; ?><br /></p>
								<strong class="price"><?php echo "Rp. ".number_format($array[$x]['price']); ?></strong>
							</div>
						</div>
					</li>
				
				<?php
					if($x==count($array)+1){
				?>
				</li>
				</ul><br>
				<?php
					}
			}
			$x++; 
		}
	}
}


?>
