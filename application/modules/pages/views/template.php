<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$base_url = base_url();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Codeigniter Shopping cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link id="callCss" rel="stylesheet" href="<?= $base_url?>themes/bootshop/bootstrap.min.css" media="screen"/>
<link href="<?= $base_url?>themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->
<link href="<?= $base_url?>themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
<link href="<?= $base_url?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<style type="<?= $base_url?>text/css" id="enject"></style>
</head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">

<div class="span6">

</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">

<div class="navbar-inner">
<a class="brand" href="index.html"></a>
<a href="<?php echo base_url('home');?>"><span class="btn btn-small btn-success">Home</span></a>
<div class="pull-right">
<a href="<?php echo base_url('cart');?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <span class="count"><?= $this->cart->total_items() ?></span> Itemes in your cart </span> </a>
</div>
</div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
<div class="row">

<div class="span12">
<ul class="breadcrumb">
<li><a href="<?php echo base_url('home');?>">Home</a> <span class="divider">/</span></li>
<li class="active"> SHOPPING CART</li>
</ul>
<h3> SHOPPING CART [ <small><span class="count"><?= $this->cart->total_items() ?></span> Item(s) </small>]<a href="<?php echo base_url('home');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
<hr class="soft"/>


<table class="table table-bordered " id="mytable">
<thead>
<tr>
<th>Product</th>
<th colspan="2">Description</th>
<th>Quantity/Update</th>
<th colspan="2">Price</th>
<th>Total</th>
</tr>
</thead>
<tbody>

<?php
$grand_total = 0;
if(!empty($cart_data)){
foreach ($cart_data as $data) {
$total = ($data['price']*$data['qty']);
$grand_total += $total;
?>
<tr>
<td> <img width="60" src="<?= $data['image'] ?>" alt=""/></td>
<td colspan="2"><?= $data['name'] ?><br/>Description : <?= $data['description'] ?></td>
<td>
<div class="input-append">
<input class="span1" style="max-width:20px" readonly="true" placeholder="1" id="appendedInputButtons<?= $data['id'] ?>" size="16" type="text" value="<?= $data['qty'] ?>">
<a class="btn" href="javascript:void(0)" onclick="reducecart('<?= $data['rowid']?>',<?= $data['qty'] ?>)"><i class="icon-minus"></i></a>
<a class="btn" href="javascript:void(0)" onclick="addtocart(<?= $data['id'] ?>)"><i class="icon-plus"></i></a>
<a href="javascript:void(0)" class="btn btn-danger"
onclick="remove_cart_product('<?= $data['rowid'] ?>')"><i class="icon-remove icon-white"></i></a> </div>
</td>
<td colspan="2">$<?= $data['price'] ?></td>
<td>$<?= $total ?></td>
</tr>

<?php }
} ?>

<tr>
<td colspan="6" style="text-align:right"><strong>TOTAL =</strong></td>
<td class="label label-important" style="display:block"> <strong> $<?= $grand_total ?> </strong></td>
</tr>
</tbody>
</table>

<script>
function addtocart(id){
if(id != ""){
$.ajax({
url:'<?php echo base_url(); ?>home/addtocart',
type:'POST',
dataType:'json',
data:{
'id' : id
},

success: function(data) {
location.reload();
}
});
} else {
return false;
}
return false;
}

function reducecart(row,qty){

if(qty != ""){
$.ajax({
url:'<?php echo base_url(); ?>home/reducecart',
type:'POST',
dataType:'json',
data:{
'row' : row,
'qty' : qty,
},

success: function(data) {
location.reload();
}
});
} else {
return false;
}
return false;
}


function remove_cart_product(row){
if(row != ""){
$.ajax({
url:'<?php echo base_url(); ?>home/remove_cart_product',
type:'POST',
dataType:'json',
data:{
'row' : row
},

success: function(data) {
location.reload();
}
});
} else {
return false;
}
return false;
}

</script>


</div>
</div></div>
</div>

</body>
</html>