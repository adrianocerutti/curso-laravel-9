@foreach($products as $product)
{{$product["product_name"]}}
<br>
{{$product["sku"]}}
<br>
{{$product["description"]}}
<hr>
@endforeach