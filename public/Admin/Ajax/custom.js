
        $(document).ready(function () {

            $('.add-product-btn').on('click', function (e) {

                e.preventDefault();

                var name = $(this).data('name');
                var price = $(this).data('price');
                var id = $(this).data('id');

                $(this).removeClass('btn-primary').addClass('btn-primary disabled')

                var html = `<tr>
                     <td>${name}</td>
                     <input type="hidden" name="product_id[]" value="${id}">
                     <td><input type="number" name="quantity[]" data-price="${price}" class="form-control pro-quantity" min="1" value="1"></td>
                     <td class="pro-price">${price}</td>
                     <td><button class="btn btn-danger remove-product-or" data-id="${id}"><i class="fas fa-trash-alt"></i></button></td>
                     </tr>`

                $('.order-product').append(html)
                calculatotal()
            });

            $('body').on('click', '.remove-product-or', function (e) {

                e.preventDefault();

                var id = $(this).data('id')
                $(this).closest('tr').remove()

                $('#product-' + id).removeClass('btn-primary disabled').addClass('btn-primary')
                calculatotal()
            });

            $('body').on('change','.pro-quantity',function () {
                var quantity = parseInt($(this).val());
                var productPrice = $(this).data('price')
                    parseInt($(this).closest('tr').find('.pro-price').html(quantity * productPrice))
                calculatotal()
            });


        });
        function calculatotal(){
            var price = 0;
                    $('.order-product .pro-price') .each(function (index) {

                        price += parseInt($(this).html())
                    });
                $('.total-price').html(price);
                    $('.total-price').html(price);
                        if(price > 0) {
                            $('#add-order').removeClass('disabled')
                        }
                        else {
                            $('#add-order').addClass('disabled')

                        }

        }

$(document).on('click','.print',function () {
    $('#print-order').printThis();

});




