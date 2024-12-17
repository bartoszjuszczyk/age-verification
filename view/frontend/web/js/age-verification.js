define([
    'jquery',
    'uiComponent',
    'mage/url'
], function ($, Component, url) {
    "use strict";
    return Component.extend({
        initialize: function (config, data) {
            this.subscribeContinueButton();
            this.subscribeBackButton();
            this.cookieTtl = parseInt(config.cookie_ttl);
            this.cookiePath = config.cookie_path;
            this.cookieDomain = config.cookie_domain;
        },
        subscribeContinueButton: function () {
            let self = this;
            $("button#j_agever_continue_btn").on('click', function () {
                self.saveCookie();
                self.hideModal();
            });
        },
        subscribeBackButton: function () {
            $("button#j_agever_back_btn").on('click', function () {
                window.history.back();
                window.setTimeout(function () {
                    window.location.href = 'https://google.com';
                }, 1000);
            })
        },
        saveCookie: function () {
            let expireDate = new Date();
            expireDate.setSeconds(expireDate.getSeconds() + this.cookieTtl);
            $.cookie('j-agever', 'true', {expires: expireDate, path: this.cookiePath, domain: this.cookieDomain})
        },
        hideModal: function () {
            $("#j_ageverification_modal").hide();
        }
    });
});
