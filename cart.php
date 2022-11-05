<?php
	if(isset($_POST['submit'])){
		
		foreach($_POST['quantity'] as $key => $val) {
			if($val==0) {
				unset($_SESSION['cart'][$key]);
				}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		
	}
	
	if(isset($_POST['order'])) {
		//require_once('repairs.php');
	}
?>
<h1>Ver carrito</h1>
<a href="chooseProducts.php?page=products">Volver a la pagina del producto</a>
<form method="post" action="chooseProducts.php?page=cart">
	
    <table>
		
        <tr>
            <th>Servicios</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
		</tr>
		
        <?php
			$conn= mysqli_connect("localhost", "root", "", "compsys");
            $sql="SELECT * FROM stock WHERE stock_id IN (";
			
			foreach($_SESSION['cart'] as $id => $value) {	
				$sql .= $id .",";
			}
			
			//$sql[37] = ' ';  
			$sql=substr($sql, 0, -1) .") ORDER BY stock_id ASC";
			//$query=mysql_query($sql);
			
			$res = mysqli_query($conn, $sql);
			if (!$res) {
				printf("No has agregado nada en el  carrito: %s\n", "");
				exit();
			}
			
			$totalprice=0;
			while($row = mysqli_fetch_array($res)){
				$subtotal = $_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'];
				$totalprice += $subtotal;
			?>
			<tr>
				<td><?php echo $row['description'] ?></td>
				<td><input type="text" name="quantity[<?php echo $row['stock_id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['stock_id']]['quantity'] ?>" /></td>
				<td><?php echo  '&#36;' .$row['price'] ?></td>
				<td><?php echo '&#36;' .$_SESSION['cart'][$row['stock_id']]['quantity']*$row['price'] ?></td>
			</tr>
			<?php
				
			}
		?>
		<tr>
			<td colspan="4">Total: <?php echo '&#36;'. $totalprice ?></td>
		</tr>
		
	</table>
    <br />
    <button type="submit" name="submit">Actualizar carrito</button>
	<button type="submit" name="submit">Imprimir</button>
</form>
<br />
<p>Para eliminar un artículo, establezca su cantidad en 0.</p>