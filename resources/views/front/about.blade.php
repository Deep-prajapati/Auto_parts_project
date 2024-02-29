@extends('front.tamplate')

@section('main-section')
<div class="site__body">
    <div class="about">
        <div class="about__body">
            <div class="about__image">
                <div class="about__image-bg" style="background-image: url('<?php echo url('front');?>/images/about-1903x1903.jpg');"></div>
                <div class="decor about__image-decor decor--type--bottom">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>
            </div>
            <div class="about__card">
                <div class="about__card-title">About Us</div>
                <div class="about__card-text">
                    {{$about->Comment}}
                </div>
                <div class="about__card-author">Ryan Ford, CEO RedParts</div>
                <div class="about__card-signature">
                    <img src="{{URL::TO('front/')}}/images/signature.jpg" width="160" height="55" alt="">
                </div>
            </div>
            <div class="about__indicators">
                <div class="about__indicators-body">
                    <div class="about__indicators-item">
                        <div class="about__indicators-item-value">350</div>
                        <div class="about__indicators-item-title">Stores around the world</div>
                    </div>
                    <div class="about__indicators-item">
                        <div class="about__indicators-item-value">80 000</div>
                        <div class="about__indicators-item-title">Original auto parts</div>
                    </div>
                    <div class="about__indicators-item">
                        <div class="about__indicators-item-value">5 000</div>
                        <div class="about__indicators-item-title">Satisfied customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection