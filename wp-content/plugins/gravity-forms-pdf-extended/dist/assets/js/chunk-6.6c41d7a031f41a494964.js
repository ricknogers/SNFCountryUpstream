(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{250:function(e,t,r){"use strict";var n=r(7),o=r(48).findIndex,a=r(86),i=r(33),c=!0,s=i("findIndex");"findIndex"in[]&&Array(1).findIndex((function(){c=!1})),n({target:"Array",proto:!0,forced:c||!s},{findIndex:function(e){return o(this,e,arguments.length>1?arguments[1]:void 0)}}),a("findIndex")},275:function(e,t,r){"use strict";r.r(t);r(31),r(38),r(39),r(19),r(250),r(32),r(80),r(18),r(81),r(41),r(29),r(25),r(175),r(40);var n=r(0),o=r.n(n),a=r(1),i=r.n(a),c=r(15),s=r(231),p=(r(57),r(16));function l(e){return(l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function u(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function f(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function m(e,t){return(m=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function y(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=d(e);if(t){var o=d(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return h(this,r)}}function h(e,t){return!t||"object"!==l(t)&&"function"!=typeof t?b(e):t}function b(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function d(e){return(d=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function v(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}
/**
 * Renders the template navigation header that get displayed on the
 * /template/:id pages.
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.1
 */var g=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&m(e,t)}(i,e);var t,r,n,a=y(i);function i(){var e;u(this,i);for(var t=arguments.length,r=new Array(t),n=0;n<t;n++)r[n]=arguments[n];return v(b(e=a.call.apply(a,[this].concat(r))),"handlePreviousTemplate",(function(t){t.preventDefault(),t.stopPropagation();var r=e.props.templates[e.props.templateIndex-1].id;r&&e.props.history.push("/template/"+r)})),v(b(e),"handleNextTemplate",(function(t){t.preventDefault(),t.stopPropagation();var r=e.props.templates[e.props.templateIndex+1].id;r&&e.props.history.push("/template/"+r)})),v(b(e),"handleKeyPress",(function(t){e.props.isFirst||37!==t.keyCode||e.handlePreviousTemplate(t),e.props.isLast||39!==t.keyCode||e.handleNextTemplate(t)})),e}return t=i,(r=[{key:"componentDidMount",value:function(){window.addEventListener("keydown",this.handleKeyPress,!1)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("keydown",this.handleKeyPress,!1)}},{key:"render",value:function(){var e=this.props.isFirst,t=this.props.isLast,r=e?"dashicons dashicons-no left disabled":"dashicons dashicons-no left",n=t?"dashicons dashicons-no right disabled":"dashicons dashicons-no right",a=e?"disabled":"",i=t?"disabled":"";return o.a.createElement("span",null,o.a.createElement("button",{onClick:this.handlePreviousTemplate,onKeyDown:this.handleKeyPress,className:r,tabIndex:"141",disabled:a},o.a.createElement("span",{className:"screen-reader-text"},this.props.showPreviousTemplateText)),o.a.createElement("button",{onClick:this.handleNextTemplate,onKeyDown:this.handleKeyPress,className:n,tabIndex:"141",disabled:i},o.a.createElement("span",{className:"screen-reader-text"},this.props.showNextTemplateText)))}}])&&f(t.prototype,r),n&&f(t,n),i}(n.Component);v(g,"propTypes",{templates:i.a.array.isRequired,templateIndex:i.a.number.isRequired,history:i.a.object,isFirst:i.a.bool,isLast:i.a.bool,showPreviousTemplateText:i.a.string,showNextTemplateText:i.a.string});var T=Object(p.f)(Object(c.b)((function(e,t){var r=t.templates,n=t.template.id,o=r.length-1;return{isFirst:r[0].id===n,isLast:r[o].id===n}}))(g)),x=(r(232),r(234)),w=(r(58),r(82),r(94),r(95),r(92),r(83),r(13));function j(e){return(j="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function O(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function P(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?O(Object(r),!0).forEach((function(t){N(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):O(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function E(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function D(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function _(e,t){return(_=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function k(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=C(e);if(t){var o=C(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return S(this,r)}}function S(e,t){return!t||"object"!==j(t)&&"function"!=typeof t?R(e):t}function R(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function C(e){return(C=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function N(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}
/**
 * Renders a delete button which then queries our server and
 * removes the selected PDF template
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.1
 */var I=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&_(e,t)}(i,e);var t,r,n,a=k(i);function i(){var e;E(this,i);for(var t=arguments.length,r=new Array(t),n=0;n<t;n++)r[n]=arguments[n];return N(R(e=a.call.apply(a,[this].concat(r))),"deleteTemplate",(function(t){t.preventDefault(),t.stopPropagation(),window.confirm(e.props.templateConfirmDeleteText)&&(e.props.templateProcessing(e.props.template.id),"success"===e.props.getTemplateProcessing&&e.props.history.push("/template"),e.props.onTemplateDelete(e.props.template.id))})),N(R(e),"ajaxFailed",(function(){var t=P({},e.props.template,{error:e.props.templateDeleteErrorText});e.props.addTemplate(t),e.props.history.push("/template"),e.props.clearTemplateProcessing()})),e}return t=i,(r=[{key:"componentDidUpdate",value:function(){var e=this.props,t=e.getTemplateProcessing,r=e.history;"success"===t&&r.push("/template"),"failed"===t&&this.ajaxFailed()}},{key:"render",value:function(){var e=this.props.callbackFunction?this.props.callbackFunction:this.deleteTemplate;return o.a.createElement("a",{onClick:e,href:"#",tabIndex:"150",className:"button button-secondary delete-theme ed_button","aria-label":this.props.buttonText+" "+GFPDF.template},this.props.buttonText)}}])&&D(t.prototype,r),n&&D(t,n),i}(n.Component);N(I,"propTypes",{template:i.a.object,addTemplate:i.a.func,onTemplateDelete:i.a.func,callbackFunction:i.a.func,templateProcessing:i.a.func,clearTemplateProcessing:i.a.func,getTemplateProcessing:i.a.string,history:i.a.object,buttonText:i.a.string,templateConfirmDeleteText:i.a.string,templateDeleteErrorText:i.a.string});var F=Object(p.f)(Object(c.b)((function(e){return{getTemplateProcessing:e.template.templateProcessing}}),(function(e){return{addTemplate:function(t){e(Object(w.p)(t))},onTemplateDelete:function(t){e(Object(w.s)(t))},templateProcessing:function(t){e(Object(w.w)(t))},clearTemplateProcessing:function(){e(Object(w.q)())}}}))(I));function A(e){return(A="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function U(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function K(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function L(e,t){return(L=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function W(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=G(e);if(t){var o=G(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return q(this,r)}}function q(e,t){return!t||"object"!==A(t)&&"function"!=typeof t?J(e):t}function J(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function G(e){return(G=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function M(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}
/**
 * Renders the template footer actions that get displayed on the
 * /template/:id pages.
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.1
 */var z=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&L(e,t)}(i,e);var t,r,n,a=W(i);function i(){var e;U(this,i);for(var t=arguments.length,r=new Array(t),n=0;n<t;n++)r[n]=arguments[n];return M(J(e=a.call.apply(a,[this].concat(r))),"notCoreTemplate",(function(t){return-1!==t.path.indexOf(e.props.pdfWorkingDirPath)})),e}return t=i,(r=[{key:"render",value:function(){var e=this.props.template,t=e.compatible;return o.a.createElement("div",{className:"theme-actions"},!this.props.isActiveTemplate&&t?o.a.createElement(x.a,{template:e,buttonText:this.props.activateText}):null,!this.props.isActiveTemplate&&this.notCoreTemplate(e)?o.a.createElement(F,{template:e,ajaxUrl:this.props.ajaxUrl,ajaxNonce:this.props.ajaxNonce,buttonText:this.props.templateDeleteText,templateConfirmDeleteText:this.props.templateConfirmDeleteText,templateDeleteErrorText:this.props.templateDeleteErrorText}):null)}}])&&K(t.prototype,r),n&&K(t,n),i}(n.Component);M(z,"propTypes",{template:i.a.object.isRequired,isActiveTemplate:i.a.bool,ajaxUrl:i.a.string,ajaxNonce:i.a.string,activateText:i.a.string,pdfWorkingDirPath:i.a.string,templateDeleteText:i.a.string,templateConfirmDeleteText:i.a.string,templateDeleteErrorText:i.a.string});var B=z,H=function(e){var t=e.image,r=t?"screenshot":"screenshot blank";return o.a.createElement("div",{className:"theme-screenshots"},o.a.createElement("div",{className:r},t?o.a.createElement("img",{src:t,alt:""}):null))};
/**
 * Display the Template Screenshot for the individual templates (uses different markup - out of our control)
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.1
 */H.propTypes={image:i.a.string};var Q=H,V=r(220),X=r(233),Y=r(247);function Z(e){return(Z="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function $(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function ee(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function te(e,t){return(te=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function re(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=oe(e);if(t){var o=oe(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return ne(this,r)}}function ne(e,t){return!t||"object"!==Z(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function oe(e){return(oe=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}r.d(t,"TemplateSingle",(function(){return se}));
/**
 * Renders a single PDF template, which get displayed on the /template/:id page.
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.1
 */
var ae,ie,ce,se=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&te(e,t)}(i,e);var t,r,n,a=re(i);function i(){return $(this,i),a.apply(this,arguments)}return t=i,(r=[{key:"shouldComponentUpdate",value:function(e){return null!=e.template}},{key:"render",value:function(){var e=this.props.template,t=this.props.activeTemplate===e.id;return o.a.createElement(s.a,{header:o.a.createElement(T,{template:e,templateIndex:this.props.templateIndex,templates:this.props.templates,showPreviousTemplateText:this.props.showPreviousTemplateText,showNextTemplateText:this.props.showNextTemplateText}),footer:o.a.createElement(B,{template:e,isActiveTemplate:t,ajaxUrl:this.props.ajaxUrl,ajaxNonce:this.props.ajaxNonce,activateText:this.props.activateText,pdfWorkingDirPath:this.props.pdfWorkingDirPath,templateDeleteText:this.props.templateDeleteText,templateConfirmDeleteText:this.props.templateConfirmDeleteText,templateDeleteErrorText:this.props.templateDeleteErrorText}),closeRoute:"/template"},o.a.createElement("div",{id:"gfpdf-template-detail-view",className:"gfpdf-template-detail"},o.a.createElement(Q,{image:e.screenshot}),o.a.createElement("div",{className:"theme-info"},o.a.createElement(X.b,{isCurrentTemplate:t,label:this.props.currentTemplateText}),o.a.createElement(X.e,{name:e.template,version:e.version,versionLabel:this.props.versionText}),o.a.createElement(X.a,{author:e.author,uri:e["author uri"]}),o.a.createElement(X.d,{group:e.group,label:this.props.groupText}),e.long_message?o.a.createElement(V.a,{text:e.long_message}):null,e.long_error?o.a.createElement(V.a,{text:e.long_error,error:!0}):null,o.a.createElement(X.c,{desc:e.description}),o.a.createElement(X.f,{tags:e.tags,label:this.props.tagsText}))))}}])&&ee(t.prototype,r),n&&ee(t,n),i}(n.Component);ae=se,ie="propTypes",ce={template:i.a.object,activeTemplate:i.a.string,templateIndex:i.a.number,templates:i.a.array,showPreviousTemplateText:i.a.string,showNextTemplateText:i.a.string,ajaxUrl:i.a.string,ajaxNonce:i.a.string,activateText:i.a.string,pdfWorkingDirPath:i.a.string,templateDeleteText:i.a.string,templateConfirmDeleteText:i.a.string,templateDeleteErrorText:i.a.string,currentTemplateText:i.a.string,versionText:i.a.string,groupText:i.a.string,tagsText:i.a.string},ie in ae?Object.defineProperty(ae,ie,{value:ce,enumerable:!0,configurable:!0,writable:!0}):ae[ie]=ce;t.default=Object(c.b)((function(e,t){var r=Object(Y.a)(e),n=t.match.params.id,o=function(e){return e.id===n};return{template:r.find(o),templateIndex:r.findIndex(o),templates:r,activeTemplate:e.template.activeTemplate}}))(se)}}]);