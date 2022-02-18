<div class="chamada-escolher">
	<div class="container">
		<h2>Close your Order!</h2>
	</div><!--container-->
</div><!--chamada-->

<div class="tabela-pedidos">
	<div class="container">
	<h2><i class="fa fa-shopping-cart"></i> Shopping Cart:</h2>
		<table>
			<tr>
				<td>Product Name</td>
				<td>Width</td>
				<td>Height</td>
				<td>Length</td>
				<td>Weight</td>
				<td>Quantity</td>
				<td>Value</td>
			</tr>
			<?php
				$itemsCarrinho = $_SESSION['carrinho'];
				$total = 0;
				foreach ($itemsCarrinho as $key => $value) {
				$idProduto = $key;
				$produto = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = $idProduto");
				$produto->execute();
				$produto = $produto->fetch();
				$valor = $value * $produto['preco'];
				$total+=$valor;
			?>
			<tr>
				<td><?php echo $produto['nome']; ?></td>
				<td><?php echo $produto['largura']; ?></td>
				<td><?php echo $produto['altura']; ?></td>
				<td><?php echo $produto['comprimento']; ?></td>
				<td><?php echo $produto['peso']; ?></td>
				<td><?php echo $value; ?></td>
				<td>R$<?php echo $valor; ?></td>
			</tr>

			<?php } ?>
			

		</table>

		<table>
			
			
			<tr>
				<td>Description</td>
			</tr>

			<tr>
				<td><?php echo $produto['descricao']; ?></td>
			</tr>
			
		</table>
	</div><!--container-->
</div><!--tabela-pedidos-->

	<div class="finalizar-pedido">
		<div class="container">
			<h2>Total: R$<?php echo Painel::convertMoney($total); ?></h2>
			<div class="clear"></div>
			<a href="" class="btn-pagamento">Pay Now!</a>
			<div class="clear"></div>
		</div>
	</div><!--finalizar-pedido-->

<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>