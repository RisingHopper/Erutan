<?php ob_start() ?>
	
<div class="container-fluid">
	<div class="row mb-2" id="secondaryIndex" >
		<div class="col-lg-1 col-md-6 col-2">
			<h4><a href="index.php?ctl=inicio">Home</a></h4>
		</div>
		<div class="col-lg-2 col-md-6 col-3">
			<h4><a href="index.php?ctl=preguntasFrecuentes">FAQs</a></h4>
		</div>
	</div>
	<div class="row pt-5 pb-0 imagenTextoFAQs">
		<div class="col-lg-12 col-md-12 col-12">
			<h1>Frequently asked questions</h1>
		</div>
	</div>
	<div class="row my-4 bg-light secondaryText">
		<h2 class="st1 ps-5 py-3">What is SVEIKi?</h2>
		<p class="px-5 st3">At Global Freaks, we offer our clients the possibility of reserving some figures before physically disposing of them in our warehouse. We have called this modality "PRE-SALE".</p>
		<hr>
		<h2 class="st1 ps-5 py-3">WHAT DO I GET WHEN I BUY THROUGH THIS METHOD?</h2>
		<p class="px-5 st3">Basically there would be 2 benefits that are obtained by buying by this method. It is a way of ensuring both quantity and price of a product. In collecting, unfortunately, the units of some figures are limited and therefore there are not as many units as we would like to offer. Sometimes there are figures that are not in stock because all the units are sold during the pre-sale. On the other hand, although there are still units at the time of arrival, it is possible that their price has increased from the moment the pre-sale was released. Therefore, what we recommend if you do not want to be left without a unit of a figure in which you are very interested is that you make your reservation while it is still in pre-sale.</p>
		<hr>
		<h2 class="st1 ps-5 py-3">WHAT AMOUNT SHOULD BE PAID AT THE TIME OF THE RESERVATION?</h2>
		<p class="px-5 st3">For a reservation to be considered closed, the price of the product would have to be paid in full. If your order exceeds €100, we offer the possibility of financing your purchase. By clicking <a href="https://www.global-freaks.com/en/content/18-payment-by-installments">here</a>, we will explain how financing works</p>
		<hr>
		<h2 class="st1 ps-5 py-3">WHEN WILL I RECEIVE MY PRE-SALE FIGURE?</h2>
		<p class="px-5 st3">In the description of each pre-sale product, the date on which said figure is received in our warehouse is indicated. This date is an approximation always based on the information provided by manufacturers or distributors. For our part, we always try that the pre-sale figures are not even 24 hours in our warehouse once they are received, but it is possible that in the manufacturing / distribution process they suffer some type of delay, so if you decide to buy a figure in pre-sale you will need some patience in some cases (not in all). You can contact us whenever you want as we will always be happy to help you and provide more information about the arrival in case we have.</p>
		<hr>
		<h2 class="st1 ps-5 py-3">CANCELLATION / MODIFICATION OF A PRE-SALE</h2>
		<p class="px-5 st3">One of the novelties of the new website is that it is no longer possible to unify products in stock with pre-sale products in the same order.
		If it would be possible to unify several products in pre-sale. If you wanted to buy pre-sale products and products in stock, you would have to make 2 or more orders. On the one hand the product in stock and on the other the product in pre-sale.
		If you plan to buy several figures in pre-sale and you want them to be sent to you separately, what you should do is place as many orders as you want shipments to be made. It is possible that if you do everything in the same order, it will not be sent to you until it is completely complete.</p><hr>
		<p class="px-5"><i>*Depending on the space available in our warehouse, even if an order has several pre-sales and is unified, we reserve the option of making partial shipments of figures that we already have with us to free up part of said space. But don't worry, the client will not have to pay extra shipping ;)</i></p>
	</div>
</div>
		
	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>