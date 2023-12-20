<div class="grid">
    <div class="product-pic">
        <img src="assets/images/shop/product_img_12.png" alt>

    </div>
    <div class="details">
        <h4><a href="#">{{$relproduct->name}}</a></h4>
        <p><a href="#">{{$relproduct->short_description}} </a></p>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="price">
            <ins>
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">$</span>{{$relproduct->reguler_price}}
                    </bdi>
                </span>
            </ins>
        </span>
        <div class="add-cart-area">
            <button class="add-to-cart">Add to cart</button>
        </div>
    </div>
</div>
