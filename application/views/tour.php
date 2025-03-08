<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <!-- intro area start -->
    <div class="intro-area pd-top-108">
        <div class="container pd-top-108">
            <div class="section-title text-lg-center text-left">
                <h2 class="title"><span>Tours and Tickets</span> to Experience</h2>
            </div>
        </div>
    </div>
    <!-- intro area End -->
    <!-- tour list area End -->
    <div class="tour-list-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 order-lg-12">
                    <div class="tour-list-area" id="ajax_data">
                        <?php
                        if ($tour->num_rows() > 0) {
                            $i = 1;
                            foreach ($tour->result() as $row) {
                                ?>
                                <a
                                    href="<?= base_url() ?>tours/<?= urlencode(str_replace(' ', '-', $row->name)) ?>/<?= $row->id ?>">
                                    <div class="single-destinations-list style-three">
                                        <div class="thumb">
                                            <?php if ($row->sale != 0)
                                                echo '<span class="d-list-tag">' . $row->sale . '% Off</span>'; ?>
                                            <img src="<?= base_url() ?><?= $row->image ?>" alt="list">
                                        </div>
                                        <div class="details">
                                            <h4 class="title">
                                                <?= $row->name ?>
                                            </h4>
                                            <p class="content">
                                                <?= mb_substr($row->short_desc, 0, 300) ?>...
                                            </p>
                                            <div class="list-price-meta">
                                                <ul class="tp-list-meta d-inline-block">
                                                    <li><i class="fa fa-clock-o"></i>
                                                        <?= $row->duration ?>
                                                    </li>
                                                </ul>
                                                <div class="tp-price-meta d-inline-block">
                                                    <p>Price</p>
                                                    <h2 class="price">From
                                                        <?php if ($row->sale != 0)
                                                            echo '<del>' . $settings->currency_symbol . $row->tour_price . '</del>'; ?>
                                                        <b>
                                                            <?= $settings->currency_symbol . $row->price ?>
                                                        </b>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                        } ?>
                    </div>
                    <div class="text-md-center text-left">
                        <div class="tp-pagination text-md-center text-left d-inline-block mt-4 pagination">
                            <?= $pagination; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-1">
                    <div class="sidebar-area">
                        <div class="widget tour-list-widget">
                            <div class="widget-tour-list-search">
                                <p>Filters</p>
                            </div>
                            <form class="form" action="<?= base_url() ?>welcome/tour_filter" name="myForm" method="post"
                                id="add_to_cart">
                                <div class="widget-tour-list-search">
                                    <div class="form-group">
                                        <input type="text" placeholder="Search" name="search" class="form-control">
                                    </div>
                                </div>
                                <div class="widget-tour-list-meta">
                                    <div class="single-widget-search-input-title mt-3">
                                        <i class="fa fa-dot-circle-o"></i> Destinations
                                    </div>
                                    <?php
                                    if ($destination->num_rows() >= 1) {
                                        foreach ($destination->result() as $row) {
                                            echo '<div class=""><input type="checkbox" name="dest_array[]" value="' . $row->id . '"> ' . $row->name . '</div>';
                                        }
                                    } ?>
                                    <div class="single-widget-search-input-title mt-3">
                                        <i class="fa fa-usd"></i> Price Filter
                                    </div>
                                    <div class="widget-product-sorting">
                                        <div class="slider-product-sorting"></div>
                                        <div class="product-range-detail">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount" name="price_filter" readonly>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-yellow w-100">Apply Filter</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tour list area End -->
    <?php include 'includes/footer.php' ?>
    <script>
        $("#add_to_cart").submit(function (e) {
            $("#ajax_data").html("");
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes form input
                success: function (data) {
                    $("#ajax_data").html(data);
                }
            });
        });
    </script>
</body>

</html>