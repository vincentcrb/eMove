!function(t){"use strict";function e(e,n){this.itemsArray=[],this.$element=t(e),this.$element.hide(),this.isSelect="SELECT"===e.tagName,this.multiple=this.isSelect&&e.hasAttribute("multiple"),this.objectItems=n&&n.itemValue,this.placeholderText=e.hasAttribute("placeholder")?this.$element.attr("placeholder"):"",this.inputSize=Math.max(1,this.placeholderText.length),this.$container=t('<div class="bootstrap-tagsinput"></div>'),this.$input=t('<input type="text" placeholder="'+this.placeholderText+'"/>').appendTo(this.$container),this.$element.before(this.$container),this.build(n)}function n(t,e){if("function"!=typeof t[e]){var n=t[e];t[e]=function(t){return t[n]}}}function i(t,e){if("function"!=typeof t[e]){var n=t[e];t[e]=function(){return n}}}function a(t){return t?l.text(t).html():""}function r(t){var e=0;if(document.selection){t.focus();var n=document.selection.createRange();n.moveStart("character",-t.value.length),e=n.text.length}else(t.selectionStart||"0"==t.selectionStart)&&(e=t.selectionStart);return e}function o(e,n){var i=!1;return t.each(n,function(t,n){if("number"==typeof n&&e.which===n)return i=!0,!1;if(e.which===n.which){var a=!n.hasOwnProperty("altKey")||e.altKey===n.altKey,r=!n.hasOwnProperty("shiftKey")||e.shiftKey===n.shiftKey,o=!n.hasOwnProperty("ctrlKey")||e.ctrlKey===n.ctrlKey;if(a&&r&&o)return i=!0,!1}}),i}var s={tagClass:function(t){return"badge badge-danger"},itemValue:function(t){return t?t.toString():t},itemText:function(t){return this.itemValue(t)},itemTitle:function(t){return null},freeInput:!0,addOnBlur:!0,maxTags:void 0,maxChars:void 0,confirmKeys:[13,44],delimiter:",",delimiterRegex:null,cancelConfirmKeysOnEmpty:!0,onTagExists:function(t,e){e.hide().fadeIn()},trimValue:!1,allowDuplicates:!1};e.prototype={constructor:e,add:function(e,n,i){var r=this;if(!(r.options.maxTags&&r.itemsArray.length>=r.options.maxTags)&&(!1===e||e)){if("string"==typeof e&&r.options.trimValue&&(e=t.trim(e)),"object"==typeof e&&!r.objectItems)throw"Can't add objects when itemValue option is not set";if(!e.toString().match(/^\s*$/)){if(r.isSelect&&!r.multiple&&r.itemsArray.length>0&&r.remove(r.itemsArray[0]),"string"==typeof e&&"INPUT"===this.$element[0].tagName){var o=r.options.delimiterRegex?r.options.delimiterRegex:r.options.delimiter,s=e.split(o);if(s.length>1){for(var l=0;l<s.length;l++)this.add(s[l],!0);return void(n||r.pushVal())}}var u=r.options.itemValue(e),p=r.options.itemText(e),c=r.options.tagClass(e),h=r.options.itemTitle(e),m=t.grep(r.itemsArray,function(t){return r.options.itemValue(t)===u})[0];if(!m||r.options.allowDuplicates){if(!(r.items().toString().length+e.length+1>r.options.maxInputLength)){var f=t.Event("beforeItemAdd",{item:e,cancel:!1,options:i});if(r.$element.trigger(f),!f.cancel){r.itemsArray.push(e);var d=t('<span class="tag '+a(c)+(null!==h?'" title="'+h:"")+'">'+a(p)+'<span data-role="remove"></span></span>');if(d.data("item",e),r.findInputWrapper().before(d),d.after(" "),r.isSelect&&!t('option[value="'+encodeURIComponent(u)+'"]',r.$element)[0]){var v=t("<option selected>"+a(p)+"</option>");v.data("item",e),v.attr("value",u),r.$element.append(v)}n||r.pushVal(),r.options.maxTags!==r.itemsArray.length&&r.items().toString().length!==r.options.maxInputLength||r.$container.addClass("bootstrap-tagsinput-max"),r.$element.trigger(t.Event("itemAdded",{item:e,options:i}))}}}else if(r.options.onTagExists){var g=t(".tag",r.$container).filter(function(){return t(this).data("item")===m});r.options.onTagExists(e,g)}}}},remove:function(e,n,i){var a=this;if(a.objectItems&&(e="object"==typeof e?t.grep(a.itemsArray,function(t){return a.options.itemValue(t)==a.options.itemValue(e)}):t.grep(a.itemsArray,function(t){return a.options.itemValue(t)==e}),e=e[e.length-1]),e){var r=t.Event("beforeItemRemove",{item:e,cancel:!1,options:i});if(a.$element.trigger(r),r.cancel)return;t(".tag",a.$container).filter(function(){return t(this).data("item")===e}).remove(),t("option",a.$element).filter(function(){return t(this).data("item")===e}).remove(),-1!==t.inArray(e,a.itemsArray)&&a.itemsArray.splice(t.inArray(e,a.itemsArray),1)}n||a.pushVal(),a.options.maxTags>a.itemsArray.length&&a.$container.removeClass("bootstrap-tagsinput-max"),a.$element.trigger(t.Event("itemRemoved",{item:e,options:i}))},removeAll:function(){var e=this;for(t(".tag",e.$container).remove(),t("option",e.$element).remove();e.itemsArray.length>0;)e.itemsArray.pop();e.pushVal()},refresh:function(){var e=this;t(".tag",e.$container).each(function(){var n=t(this),i=n.data("item"),r=e.options.itemValue(i),o=e.options.itemText(i),s=e.options.tagClass(i);if(n.attr("class",null),n.addClass("tag "+a(s)),n.contents().filter(function(){return 3==this.nodeType})[0].nodeValue=a(o),e.isSelect){t("option",e.$element).filter(function(){return t(this).data("item")===i}).attr("value",r)}})},items:function(){return this.itemsArray},pushVal:function(){var e=this,n=t.map(e.items(),function(t){return e.options.itemValue(t).toString()});e.$element.val(n,!0).trigger("change")},build:function(e){var a=this;if(a.options=t.extend({},s,e),a.objectItems&&(a.options.freeInput=!1),n(a.options,"itemValue"),n(a.options,"itemText"),i(a.options,"tagClass"),a.options.typeahead){var l=a.options.typeahead||{};i(l,"source"),a.$input.typeahead(t.extend({},l,{source:function(e,n){function i(t){for(var e=[],i=0;i<t.length;i++){var o=a.options.itemText(t[i]);r[o]=t[i],e.push(o)}n(e)}this.map={};var r=this.map,o=l.source(e);t.isFunction(o.success)?o.success(i):t.isFunction(o.then)?o.then(i):t.when(o).then(i)},updater:function(t){return a.add(this.map[t]),this.map[t]},matcher:function(t){return-1!==t.toLowerCase().indexOf(this.query.trim().toLowerCase())},sorter:function(t){return t.sort()},highlighter:function(t){var e=new RegExp("("+this.query+")","gi");return t.replace(e,"<strong>$1</strong>")}}))}if(a.options.typeaheadjs){var u=null,p={},c=a.options.typeaheadjs;t.isArray(c)?(u=c[0],p=c[1]):p=c,a.$input.typeahead(u,p).on("typeahead:selected",t.proxy(function(t,e){p.valueKey?a.add(e[p.valueKey]):a.add(e),a.$input.typeahead("val","")},a))}a.$container.on("click",t.proxy(function(t){a.$element.attr("disabled")||a.$input.removeAttr("disabled"),a.$input.focus()},a)),a.options.addOnBlur&&a.options.freeInput&&a.$input.on("focusout",t.proxy(function(e){0===t(".typeahead, .twitter-typeahead",a.$container).length&&(a.add(a.$input.val()),a.$input.val(""))},a)),a.$container.on("keydown","input",t.proxy(function(e){var n=t(e.target),i=a.findInputWrapper();if(a.$element.attr("disabled"))return void a.$input.attr("disabled","disabled");switch(e.which){case 8:if(0===r(n[0])){var o=i.prev();o.length&&a.remove(o.data("item"))}break;case 46:if(0===r(n[0])){var s=i.next();s.length&&a.remove(s.data("item"))}break;case 37:var l=i.prev();0===n.val().length&&l[0]&&(l.before(i),n.focus());break;case 39:var u=i.next();0===n.val().length&&u[0]&&(u.after(i),n.focus())}var p=n.val().length;Math.ceil(p/5);n.attr("size",Math.max(this.inputSize,n.val().length))},a)),a.$container.on("keypress","input",t.proxy(function(e){var n=t(e.target);if(a.$element.attr("disabled"))return void a.$input.attr("disabled","disabled");var i=n.val(),r=a.options.maxChars&&i.length>=a.options.maxChars;a.options.freeInput&&(o(e,a.options.confirmKeys)||r)&&(0!==i.length&&(a.add(r?i.substr(0,a.options.maxChars):i),n.val("")),!1===a.options.cancelConfirmKeysOnEmpty&&e.preventDefault());var s=n.val().length;Math.ceil(s/5);n.attr("size",Math.max(this.inputSize,n.val().length))},a)),a.$container.on("click","[data-role=remove]",t.proxy(function(e){a.$element.attr("disabled")||a.remove(t(e.target).closest(".tag").data("item"))},a)),a.options.itemValue===s.itemValue&&("INPUT"===a.$element[0].tagName?a.add(a.$element.val()):t("option",a.$element).each(function(){a.add(t(this).attr("value"),!0)}))},destroy:function(){var t=this;t.$container.off("keypress","input"),t.$container.off("click","[role=remove]"),t.$container.remove(),t.$element.removeData("tagsinput"),t.$element.show()},focus:function(){this.$input.focus()},input:function(){return this.$input},findInputWrapper:function(){for(var e=this.$input[0],n=this.$container[0];e&&e.parentNode!==n;)e=e.parentNode;return t(e)}},t.fn.tagsinput=function(n,i,a){var r=[];return this.each(function(){var o=t(this).data("tagsinput");if(o)if(n||i){if(void 0!==o[n]){if(3===o[n].length&&void 0!==a)var s=o[n](i,null,a);else var s=o[n](i);void 0!==s&&r.push(s)}}else r.push(o);else o=new e(this,n),t(this).data("tagsinput",o),r.push(o),"SELECT"===this.tagName&&t("option",t(this)).attr("selected","selected"),t(this).val(t(this).val())}),"string"==typeof n?r.length>1?r:r[0]:r},t.fn.tagsinput.Constructor=e;var l=t("<div />");t(function(){t("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput()})}(window.jQuery);