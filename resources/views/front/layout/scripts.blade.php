<?php use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters();
// dd($productFilters);
?>
<script>
    $(document).ready(function() {
        //sort by filter
        $("#sort").on("change", function() {
            // this.form.submit();
            var sort = $("#sort").val();
            var url = $("#url").val();
            var color = get_filter('color');
            var size = get_filter('size');
            var brand = get_filter('brand');
            var price = get_filter('price');

            @foreach ($productFilters as $filter)
                var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
            @endforeach

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: "Post",
                data: {
                    @foreach ($productFilters as $filter)
                        {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                    @endforeach
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,

                },
                success: function(data) {
                    $(".filter_products").html(data);
                },
                error: function() {
                    alert("Error");
                },
            });
        });
        //size filter
        $(".size").on("change", function() {
            // this.form.submit();
            var color = get_filter('color');
            var brand = get_filter('brand');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach ($productFilters as $filter)
                var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
            @endforeach
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: "Post",
                data: {
                    @foreach ($productFilters as $filter)
                        {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                    @endforeach
                    sort: sort,
                    url: url,
                    size: size,
                    brand: brand,
                    color: color,
                },
                success: function(data) {
                    $(".filter_products").html(data);
                },
                error: function() {
                    alert("Error");
                },
            });
        });

        //color filter
        $(".color").on("change", function() {
            // this.form.submit();
            var color = get_filter('color');
            var brand = get_filter('brand');
            var price = get_filter('price');

            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach ($productFilters as $filter)
                var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
            @endforeach

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: "Post",
                data: {
                    @foreach ($productFilters as $filter)
                        {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                    @endforeach
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    brand: brand,
                    price: price,

                },
                success: function(data) {
                    $(".filter_products").html(data);
                },
                error: function() {
                    alert("Error");
                },
            });
        });

        //price filter
        $(".price").on("change", function() {
            // this.form.submit();
            var price = get_filter('price');
            var brand = get_filter('brand');


            var color = get_filter('color');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach ($productFilters as $filter)
                var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
            @endforeach
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: "Post",
                data: {
                    @foreach ($productFilters as $filter)
                        {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                    @endforeach
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,
                },
                success: function(data) {
                    $(".filter_products").html(data);
                },
                error: function() {
                    alert("Error");
                },
            });
        });
        //price filter
        $(".brand").on("change", function() {
            // this.form.submit();
            var brand = get_filter('brand');
            var price = get_filter('price');

            var color = get_filter('color');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach ($productFilters as $filter)
                var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
            @endforeach
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: url,
                method: "Post",
                data: {
                    @foreach ($productFilters as $filter)
                        {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                    @endforeach
                    sort: sort,
                    url: url,
                    size: size,
                    color: color,
                    price: price,
                    brand: brand,
                },
                success: function(data) {
                    $(".filter_products").html(data);
                },
                error: function() {
                    alert("Error");
                },
            });
        });


        //Dyamic filter
        @foreach ($productFilters as $filter)
            $(".{{ $filter['filter_column'] }}").on("click", function() {
                var url = $("#url").val();
                var sort = $("#sort option:selected").val();
                var color = get_filter('color');
                var size = get_filter('size');
                var price = get_filter('price');
                var brand = get_filter('brand');


                @foreach ($productFilters as $filter)
                    var {{ $filter['filter_column'] }} = get_filter("{{ $filter['filter_column'] }}");
                @endforeach
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: url,
                    method: "Post",
                    data: {
                        @foreach ($productFilters as $filter)
                            {{ $filter['filter_column'] }}: {{ $filter['filter_column'] }},
                        @endforeach
                        url: url,
                        sort: sort,
                        size: size,
                        color: color,
                        price: price,
                        brand: brand,

                    },
                    success: function(data) {
                        $(".filter_products").html(data);
                    },
                    error: function() {
                        alert("Error");
                    },
                });
            });
        @endforeach

    });
</script>
