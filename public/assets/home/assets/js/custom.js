$(document).ready(function () {
    $("#sort").on("change", function () {
        // this.form.submit();
        var sort = $("#sort").val();
        var url = $("#url").val();

        var min_price = $("#min_price").val();
        var max_price = $("#max_price").val();
        //alert(url)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: 'Post',
            data: {sort: sort, url: url, min_price: min_price, max_price:max_price},
            success: function (data) {
                $('.filter_products').html(data);
            }, error: function () {
                alert("Error");
            }
        })

    });
});


