define([
    'jquery',
    'uiComponent',
    'mage/url',
    'jquery/validate'
], function ($, Component, url) {
    "use strict";
    return Component.extend({
        initialize: function (config, data) {
            this.subscribeContinueButton();
            this.subscribeBackButton();
            this.addValidationRule();
            this.cookieTtl = parseInt(config.cookie_ttl);
            this.cookiePath = config.cookie_path;
            this.cookieDomain = config.cookie_domain;
        },
        addValidationRule: function () {
            $.validator.addMethod("ageverification", function (value, element) {
                let inputDate = Date.parse(value);
                let now = new Date();
                let verificationThreshold = now.setFullYear(now.getFullYear() - 18);
                return inputDate <= verificationThreshold;
            }, "Your age does not complain with terms.");
        },
        subscribeContinueButton: function () {
            let self = this;
            $("button#j_agever_continue_btn").on('click', function () {
                let dobForm = $("#j_ageverification_dob_form");
                dobForm.validate();
                if (!dobForm.valid()) {
                    return false;
                }
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
        },
        verifyDobInput: function () {
            let dobInputSelector = $("input#j_ageverification_dob_input");
            if (!(dobInputSelector.length)) {
                return false;
            }
            let inputDate = Date.parse(dobInputSelector.val());
            let now = new Date();
            let verificationThreshold = now.setFullYear(now.getFullYear() - 18);
            return inputDate <= verificationThreshold;
        }
    });
});
