

	<div class="row mt-5">
		<div class="col-3">
			<b>Categories</b>

			<ul style="list-style-type: none; line-height: 50px;">
				<li>Women's Clothing</li>
				<li>Men's Clothing</li>
				<li>Wedding events</li>
				<li>Education and office supplies</li>
			</ul>
		</div>
		<div class="col-9">
			<div class="row">

                <div class="col-6" style="text-align: center;">
                    <b><h3>Recommend you</h3></b>
                </div>
				
                <div class="col-6">
                <form method="GET">
                    <button class="btn btn-secondary" type="submit" name="filter_min"> Mininum </button>
                    <button class="btn btn-secondary" type="button" name="filter"> Maximum </button>
                    <button class="btn btn-secondary" type="submit" name="range_filter"> High to low </button>
                </form>
                </div>
                
			</div>

<?php


if (isset($_GET['range_filter'])) {

    foreach ($products as $key=>$value) {
    $min_array[$key] = $value['price'];
    }

    asort($min_array);

    foreach ($min_array as $key=>$value) {
    $array[$key] = $products[$key];
    }

    $products = $array;
}

if (isset($_GET['filter_min'])) {

    $min = $products['desktop_stand']['price'];
    foreach ($products as $key=>$item) {

        if ($item['price'] > $min) {
            $min = $item['price'];
            $min_key = $key;
        }
    }

    $temp_array = $products[$min_key];

    $products = [$temp_array];
}

if (isset($_GET['sort_min'])) {

    foreach ($products as $key=>$item) {

        if ($item['price'] > $min) {
            $min = $item['price'];
            $min_key = $key;
        }
    }

    $temp_array = $products[$min_key];

    $products = [$temp_array];
}

?>
			<div class="row">

				<?php foreach($products as $key=>$item):?>
				<!-- Product Start -->

				<?php if ($item['category']=="Electronics"):?>
				<div class="col-3">
					<a href="?page=product&product=<?php echo $key?>">
					<div class="card">
						<img src="<?php echo $item['image'];?>" alt="">
						<h6><?php echo $item['title'];?></h6>
						<h5>$ <?php echo $item['price'];?> so'm</h5>
					</div>
					</a>
				</div>
				<?php endif;?>
				<!-- Product End -->
				<?php endforeach;?>
			</div>
		</div>
	</div>

