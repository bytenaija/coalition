<?php
    $total = 0;
?>

<div class="table-responsive">
<table class="table">
<thead>
    <tr>
        <td>Product Name</td>
        <td>Quantity in Stock</td>
        <td>Price per Item</td>
        <td>Datetime Submitted</td>

        <td class="text-right">Total value number</td>
        <td class="text-right">Actions</td>
    </tr>
</thead>

<tbody>
    @foreach($contents->products as $index=>$product)
    @include('edit-product-modal')
    <?php

        $totalValue = $product->quantity * $product->price;
        $total += $totalValue;
    ?>
    <tr class="clickable-row" data-href="">
        <td>{{$product->productName}}</td>
        <td>{{number_format($product->quantity, 0)}}</td>
        <td>{{number_format($product->price, 2)}}</td>
        <td>{{$product->date}}</td>
        <td class="text-right">{{number_format($totalValue, 2)}}</td>
    <td class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{$index}}">Edit</button></td>
    </tr>
    @endforeach
    <tr class="total">
            <td class="text-left" >Sum Total</td>
    <td class="text-right" colspan="4">{{number_format($total, 2)}}</td>

</tr>
</tbody>

</table>
</div>
