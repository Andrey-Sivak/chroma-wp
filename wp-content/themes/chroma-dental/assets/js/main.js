'use strict';

import { Menu } from "./Menu";
import { Calculator } from "./calculator";
import { Validation } from "./validationClass";
import { Slider } from "./slider";

window.addEventListener('load', function () {

    (function homePageLazyLoad() {
        const map = `<iframe class="seven-section__map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.2656754737127!2d-79.38591397100674!3d43.76734362994252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b2d4c7f5fd9bb%3A0x1769d2f59ba6dcfc!2s595%20Sheppard%20Ave%20E%2C%20North%20York%2C%20ON%2C%20Canada!5e0!3m2!1sen!2s!4v1602691137167!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>`;
        const mapContainer = document.querySelector('.seven-section');
        let scrollCheck = true;
        window.addEventListener('scroll', function (e) {
            let scroll = document.documentElement.scrollTop;
            if( scrollCheck ) {
                if( scroll >= 1000 ) {
                    mapContainer.insertAdjacentHTML('afterbegin', map );
                    scrollCheck = false;
                }
            }
        })
    })();

    (function checkImagesFormat() {
        if (!window.createImageBitmap) {
            const els = [...document.querySelectorAll('[data-bg]')];
            els.forEach( (item) => {
                const style = item.currentStyle || window.getComputedStyle(item, false);
                let path = style.backgroundImage.slice(4, -1).replace(/"/g, "");
                path = path.replace('webp', 'jpg');
                item.style.backgroundImage = `url(${path})`;
                console.log(item.style.backgroundImage);
            });
        }
    })();

    (function homePageSlider() {
        const sliderWrap = document.querySelector('.slider__wrap');

        if( !sliderWrap ) {
            return;
        }

        const slider = new Slider({
            wrap: '.slider__wrap',
            autoplay: true,
            autoplayDelay: 4000,
            dotsWrap: 'slider__dots'
        });

        slider.init();
    })();

    (function menu() {
        const menu = new Menu({
            button: document.querySelector('.header-menu__btn'),
            hamburger: document.querySelector('.header-menu__burger'),
            menu: document.querySelector('.header__menu'),
            activeClass: 'active'
        });

        menu.init();
    })();

    (function calculator() {
        Calculator('calculator');
    })();

    (function validation() {
        const form = document.querySelector('#form-page__form');
        if( !form ) {
            return;
        }

        const valid = new Validation({
            submitBtn: 'form-page__form_btn',
            firstName: 'first-name',
            lastName: 'last-name',
            phone: 'phone',
            checkbox: 'check',
        });

        valid.init();

        $(form).submit(function() {

            if (valid.success) {
                const form = $(this);
                const data = form.serialize();
                const url = form.attr('action');
                const type = 'POST';
                const nextPage = valid.submitBtn.dataset.link;

                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success: function() {
                        window.location.href = nextPage;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    },
                });
            }
            return false;
        });

        addCalculatorData();

        function addCalculatorData() {
            const ageInput = form.querySelector('#age');
            const problemInput = form.querySelector('#problem');

            const ageValue = localStorage.getItem('age');
            const problemValue = localStorage.getItem('problem');

            ageInput.value = ageValue;
            problemInput.value = problemValue;
        }
    })();

    (function emergencyValidation() {
        const form = document.querySelector('.second-section__form');

        if( !form ) {
            return;
        }

        const valid = new Validation({
            submitBtn: 'emergency__form_btn',
            firstName: 'first-name',
            lastName: 'last-name',
            phone: 'phone',
            checkbox: 'check',
        });

        valid.init();

        $(form).submit(function() {

            if (valid.success) {
                const form = $(this);
                const data = form.serialize();
                const url = form.attr('action');
                const type = 'POST';
                const nextPage = valid.submitBtn.dataset.link;

                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success: function() {
                        window.location.href = nextPage;
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    },
                });
            }
            return false;
        });
    })();

    (function contactsValidation() {
        const form = document.querySelector('.form');

        if( !form ) {
            return;
        }

        const valid = new Validation({
            submitBtn: 'contacts__form_btn',
            firstName: 'name',
            email: 'email',
            phone: 'phone',
        });

        valid.init();

        $(form).submit(function() {

            if (valid.success) {

                const form = $(this);
                const data = form.serialize();
                const url = form.attr('action');
                const type = 'POST';

                $.ajax({
                    type: type,
                    url: url,
                    data: data,
                    success: function() {
                        form[0].reset();
                        thankMessage();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    },
                });
            }
            return false;
        });

        function thankMessage() {
            const el = document.createElement('div');
            el.classList.add('contact__popup');
            el.dataset.close = 'true';
            const elContent = `<div class="contact__popup-window">
                                  <span class="close" data-close="true">&times;</span>
                                  <p class="contact__popup-caption">Thanks for the application!</p>
                                  <p class="contact__popup-text">We will contact you shortly!</p>
                                </div>`;
            el.insertAdjacentHTML('afterBegin', elContent);

            document.body.appendChild( el );
            setTimeout( function () {
                el.classList.add('show');
                document.body.classList.add('forbid-scroll');
            },10);

            setTimeout( function () {
                if(el.classList.contains('show')) {
                    el.classList.remove('show');
                    document.body.classList.remove('forbid-scroll');

                    setTimeout( function () {
                        document.body.removeChild(el);
                    },300);
                }
            },7000);

            el.addEventListener('click', function (e) {
                const target = e.target;

                if( target.dataset.close
                    && el.classList.contains('show') ) {
                    el.classList.remove('show');
                    document.body.classList.remove('forbid-scroll');

                    setTimeout( function () {
                        document.body.removeChild(el);
                    },300);
                }
            })
        }
    })();
});