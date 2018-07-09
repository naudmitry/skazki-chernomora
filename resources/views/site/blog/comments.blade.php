<div class="comments-area">
    <div class="sec-title">
        <h6>Комментарии (3)</h6>
    </div>
    <div class="comment">
        <div class="image-holder">
            <figure>
                <img src="{{ URL::to('/images/blog/1.png') }}" alt="">
            </figure>
        </div>
        <div class="image-text">
            <h6>Jacky Chan<span>April 06, 2018</span></h6>
            <a href="#"><h5><i class="fa fa-reply-all" aria-hidden="true"></i>Comment Back</h5></a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam sequi praesentium, veritatis nulla quam at exercitationem? Nesciunt molestiae neque modi.</p>
        </div>
    </div>
    <div class="comment reply-comment">
        <div class="image-holder">
            <figure>
                <img src="{{ URL::to('/images/blog/2.png') }}" alt="">
            </figure>
        </div>
        <div class="image-text">
            <h6>Robben Oti<span>April 07, 2018</span></h6>
            <a href="#"><h5><i class="fa fa-reply-all" aria-hidden="true"></i>Comment Back</h5></a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, a! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, obcaecati!</p>
        </div>
    </div>
    <div class="comment">
        <div class="image-holder">
            <figure>
                <img src="{{ URL::to('/images/blog/3.png') }}" alt="">
            </figure>
        </div>
        <div class="image-text">
            <h6>Chang Lingma<span>May 12, 2018</span></h6>
            <h5><i class="fa fa-reply-all" aria-hidden="true"></i>Comment Back</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae possimus suscipit esse quia sapiente obcaecati consequuntur dolor sequi adipisci unde!</p>
        </div>
    </div>
</div>

<div class="form-area">
    <div class="sec-title">
        <h6>Оставить комментарий</h6>
    </div>
    <form id="contact_form" name="contact_form" class="default-form">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <textarea
                            name="form_message"
                            class="form-control textarea required"
                            placeholder="Ваш комментарий"
                    ></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <input
                            type="text"
                            name="form_name"
                            class="form-control"
                            value=""
                            placeholder="Ваше имя"
                            required=""
                    >
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <input
                            type="email"
                            name="form_email"
                            class="form-control required email"
                            value=""
                            placeholder="Ваш email"
                            required=""
                    >
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-bottom">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                    <button
                            class="btn-style-one"
                            type="submit"
                            data-loading-text="Пожалуйста, подождите..."
                    >Комментировать</button>
                </div>
            </div>
        </div>
    </form>
</div>
