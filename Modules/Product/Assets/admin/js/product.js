!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:n})},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=261)}({261:function(e,t,r){e.exports=r(262)},262:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(t,r,n){return r&&e(t.prototype,r),n&&e(t,n),t}}();new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.managerStock(),window.admin.removeSubmitButtonOffsetOn(["#images","#attributes","#options","#related_products","#up_sells","#cross_sells","#reviews"]),$("#product-create-form, #product-edit-form").on("submit",this.submit)}return n(e,[{key:"managerStock",value:function(){$("#manage_stock").on("change",function(e){"1"===e.currentTarget.value?$("#qty-field").removeClass("hide"):$("#qty-field").addClass("hide")})}},{key:"submit",value:function(e){e.preventDefault(),DataTable.removeLengthFields(),window.form.appendHiddenInputs("#product-create-form, #product-edit-form","up_sells",DataTable.getSelectedIds("#up_sells .table")),window.form.appendHiddenInputs("#product-create-form, #product-edit-form","cross_sells",DataTable.getSelectedIds("#cross_sells .table")),window.form.appendHiddenInputs("#product-create-form, #product-edit-form","related_products",DataTable.getSelectedIds("#related_products .table")),e.currentTarget.submit()}}]),e}())}});