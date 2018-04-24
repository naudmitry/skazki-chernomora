@{{#reviews.buyer}}
    <div>
        @{{review.buyer.name}}
    </div>
    @{{review.buyer.surname}}
@{{/reviews.buyer}}

@{{^reviews.buyer}}
    <div>
        @{{review.customer_name}}
    </div>
    @{{review.customer_position}}
@{{/reviews.buyer}}
