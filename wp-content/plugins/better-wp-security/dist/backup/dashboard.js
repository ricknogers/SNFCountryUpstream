this.itsec=this.itsec||{},this.itsec.backup=this.itsec.backup||{},this.itsec.backup.dashboard=(window.itsecWebpackJsonP=window.itsecWebpackJsonP||[]).push([[7],{"1ZqX":function(e,t){!function(){e.exports=this.wp.data}()},"8OQS":function(e,t){e.exports=function(e,t){if(null==e)return{};var r,n,a={},c=Object.keys(e);for(n=0;n<c.length;n++)r=c[n],t.indexOf(r)>=0||(a[r]=e[r]);return a}},B6iu:function(e,t,r){},FqII:function(e,t){!function(){e.exports=this.wp.date}()},GRId:function(e,t){!function(){e.exports=this.wp.element}()},K9lf:function(e,t){!function(){e.exports=this.wp.compose}()},Mmq9:function(e,t){!function(){e.exports=this.wp.url}()},QILm:function(e,t,r){var n=r("8OQS");e.exports=function(e,t){if(null==e)return{};var r,a,c=n(e,t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(a=0;a<o.length;a++)r=o[a],t.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(e,r)&&(c[r]=e[r])}return c}},Td6G:function(e,t,r){"use strict";r.d(t,"c",(function(){return _})),r.d(t,"b",(function(){return H})),r.d(t,"o",(function(){return z})),r.d(t,"m",(function(){return G})),r.d(t,"j",(function(){return Y})),r.d(t,"e",(function(){return X})),r.d(t,"f",(function(){return Z})),r.d(t,"d",(function(){return $})),r.d(t,"l",(function(){return K})),r.d(t,"a",(function(){return V})),r.d(t,"i",(function(){return ee})),r.d(t,"h",(function(){return te})),r.d(t,"g",(function(){return re})),r.d(t,"k",(function(){return ne})),r.d(t,"n",(function(){return ae}));var n=r("J4zp"),a=r.n(n),c=r("RIqP"),o=r.n(c),i=r("YLtl"),s=r("GRId"),u=r("Mmq9"),l=r("lwsE"),f=r.n(l),d=r("W8MJ"),b=r.n(d),p=r("lSNA"),h=r.n(p),m=r("92Nh"),v=r.n(m),g=r("tmk3"),O=r.n(g);function y(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,t){if(!e)return;if("string"==typeof e)return j(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return j(e,t)}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var n=0,a=function(){};return{s:a,n:function(){return n>=e.length?{done:!0}:{done:!1,value:e[n++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var c,o=!0,i=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return o=e.done,e},e:function(e){i=!0,c=e},f:function(){try{o||null==r.return||r.return()}finally{if(i)throw c}}}}function j(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var k=new WeakMap,E=new WeakMap,_=function(){function e(){var t=this,r=arguments.length>0&&void 0!==arguments[0]?arguments[0]:void 0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:void 0,a=arguments.length>2&&void 0!==arguments[2]?arguments[2]:void 0;f()(this,e),k.set(this,{writable:!0,value:{}}),E.set(this,{writable:!0,value:{}}),h()(this,"add",(function(e,r){return O()(t,k)[e]||(O()(t,k)[e]=[]),O()(t,k)[e].push(r),t})),h()(this,"hasErrors",(function(){return t.getErrorCodes().length>0})),h()(this,"getErrorCodes",(function(){return Object.keys(O()(t,k))})),h()(this,"getErrorCode",(function(){return t.getErrorCodes()[0]})),h()(this,"getErrorMessages",(function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:void 0;if(e)return O()(t,k)[e];var r=[];for(var n in O()(t,k))O()(t,k).hasOwnProperty(n)&&r.concat(O()(t,k)[n]);return r})),h()(this,"getErrorMessage",(function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:void 0;return e=e||t.getErrorCode(),t.getErrorMessages(e)[0]})),h()(this,"getErrorData",(function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:void 0;return e=e||t.getErrorCode(),O()(t,E)[e]})),h()(this,"getAllErrorMessages",(function(){var e=[];for(var r in O()(t,k))O()(t,k).hasOwnProperty(r)&&e.push.apply(e,o()(O()(t,k)[r]));return e})),r&&(n&&(O()(this,k)[r]=[n]),a&&(O()(this,E)[r]=a))}return b()(e,null,[{key:"fromPHPObject",value:function(t){var r=new e;return v()(r,k,t.errors),v()(r,E,t.error_data),r}},{key:"fromApiError",value:function(t){var r=new e;if(O()(r,k)[t.code]=[t.message],O()(r,E)[t.code]=t.data,t.additional_errors){var n,a=y(t.additional_errors);try{for(a.s();!(n=a.n()).done;){var c=n.value;O()(r,k)[c.code]=[c.message],O()(r,E)[c.code]=c.data}}catch(e){a.e(e)}finally{a.f()}}return r}}]),e}(),w=r("PJYZ"),S=r.n(w),x=r("7W2i"),N=r.n(x),A=r("a1gu"),C=r.n(A),I=r("Nsbk"),P=r.n(I),R=r("oShl"),L=r.n(R),M=r("l3Sj");function T(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=P()(e);if(t){var a=P()(this).constructor;r=Reflect.construct(n,arguments,a)}else r=n.apply(this,arguments);return C()(this,r)}}var D=function(e){N()(r,e);var t=T(r);function r(e){var n;f()(this,r);for(var a=arguments.length,c=new Array(a>1?a-1:0),o=1;o<a;o++)c[o-1]=arguments[o];for(var i in n=t.call.apply(t,[this,e.message||Object(M.__)("An unknown error occurred.","better-wp-security")].concat(c)),Error.captureStackTrace&&Error.captureStackTrace(S()(n),r),n.__response=e,e)e.hasOwnProperty(i)&&Object.defineProperty(S()(n),i,{value:e[i],configurable:!0,enumerable:!0,writable:!0});return n}return b()(r,[{key:"toString",value:function(){return this.__response.toString()}},{key:"getResponse",value:function(){return this.__response}}]),r}(L()(Error));r("LhCv");var W=r("yXPU"),U=r.n(W),q=r("o0o1"),F=r.n(q),H=function(){function e(t,r,n,a,c,o){f()(this,e),h()(this,"type",void 0),h()(this,"error",void 0),h()(this,"data",void 0),h()(this,"success",void 0),h()(this,"info",void 0),h()(this,"warning",void 0),this.type=t,this.error=r,this.data=n,this.success=a,this.info=c,this.warning=o,Object.seal(this)}var t;return b()(e,[{key:"isSuccess",value:function(){return this.type===e.SUCCESS}}],[{key:"fromResponse",value:(t=U()(F.a.mark((function t(r){var n,a,c,o,i,s,u;return F.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(n=function(e){var t,n=null===(t=r.headers)||void 0===t?void 0:t.get("X-Messages-".concat(e));return n?JSON.parse(n):[]},204===r.status||!r.json){t.next=7;break}return t.next=4,r.json();case 4:t.t0=t.sent,t.next=8;break;case 7:t.t0=null;case 8:return a=t.t0,c=X(a),o=c.hasErrors()?e.ERROR:e.SUCCESS,i=n("Success"),s=n("Info"),u=n("Warning"),t.abrupt("return",new e(o,c,a,i,s,u));case 15:case"end":return t.stop()}}),t)}))),function(e){return t.apply(this,arguments)})}]),e}();function Q(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=function(e,t){if(!e)return;if("string"==typeof e)return B(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return B(e,t)}(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var n=0,a=function(){};return{s:a,n:function(){return n>=e.length?{done:!0}:{done:!1,value:e[n++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var c,o=!0,i=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return o=e.done,e},e:function(e){i=!0,c=e},f:function(){try{o||null==r.return||r.return()}finally{if(i)throw c}}}}function B(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}Object.defineProperty(H,"SUCCESS",{value:"success",writable:!1,enumerable:!1,configurable:!1}),Object.defineProperty(H,"ERROR",{value:"error",writable:!1,enumerable:!1,configurable:!1});var J=Object(s.createContext)({getUrl:function(e){e="settings"===e?"itsec":"itsec-"+e;var t=u.removeQueryArgs.apply(void 0,[document.location.href].concat(o()(Object.keys(Object(u.getQueryArgs)(document.location.href)))));return Object(u.addQueryArgs)(t,{page:e})}});function z(e){return(0,Object(s.useContext)(J).getUrl)(e)}function G(e){if(e<=999)return e.toString();if(e<=9999){var t=(e/1e3).toFixed(1);return"0"===t.charAt(t.length-1)?t.replace(".0","k"):"".concat(t,"k")}if(e<=99999)return e.toString().substring(0,2)+"k";if(e<=999999)return e.toString().substring(0,3)+"k";if(e<=9999999){var r=(e/1e6).toFixed(1);return"0"===r.charAt(r.length-1)?r.replace(".0","m"):"".concat(r,"m")}if(e<=99999999)return e.toString().substring(0,2)+"m";if(e<=999999999)return e.toString().substring(0,3)+"m";if(e<=9999999999){var n=(e/1e9).toFixed(1);return"0"===n.charAt(n.length-1)?n.replace(".0","b"):"".concat(n,"b")}return e}function Y(e){if(!Object(i.isPlainObject)(e))return!1;var t=Object.keys(e);return 2===t.length&&(t.includes("errors")&&t.includes("error_data"))}function X(e){return e instanceof _?e:Y(e)?_.fromPHPObject(e):function(e){if(!Object(i.isPlainObject)(e))return!1;var t=Object.keys(e);return(3===t.length||4===t.length)&&(!(4===t.length&&!t.includes("additional_errors"))&&(t.includes("code")&&t.includes("message")&&t.includes("data")))}(e)?_.fromApiError(e):new _}function Z(e){var t,r={},n=Q(e);try{for(n.s();!(t=n.n()).done;){var c=a()(t.value,2),o=c[0],i=c[1];r[o]=i}}catch(e){n.e(e)}finally{n.f()}return r}function $(e,t){var r,n=[[],[]],a=Q(e);try{for(a.s();!(r=a.n()).done;){var c=r.value;n[t(c)?0:1].push(c)}}catch(e){a.e(e)}finally{a.f()}return n}function K(e){if(e instanceof Error)throw e;throw new D(e)}var V="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=96&d=mm&f=y&r=g";function ee(e,t){var r=!(arguments.length>2&&void 0!==arguments[2])||arguments[2];return Object(i.get)(e,["_links","self",0,"targetHints",t],r?void 0:[])}function te(e){return function(e,t){return Object(i.get)(e,["_links",t,0,"href"])}(e,"self")}function re(e,t){if(e&&e.links){var r,n=Q(e.links);try{for(n.s();!(r=n.n()).done;){var a=r.value;if(a.rel===t)return a}}catch(e){n.e(e)}finally{n.f()}}}function ne(e,t){if("object"!==e.type)return e;var r;for(var n in t)t.hasOwnProperty(n)&&"hidden"===t[n]["ui:widget"]&&(r||(r=Object(i.cloneDeep)(e)),delete r.properties[n]);return r||e}function ae(e){var t=[];if(!e)return t;var r=e instanceof _?e:X(Object(i.pick)(e,["code","message","data"]));return"rest_invalid_param"===r.getErrorCode()&&(t=Object.values(r.getErrorData().params)),[].concat(o()(r.getAllErrorMessages()),o()(t))}},TvNi:function(e,t){!function(){e.exports=this.wp.plugins}()},YLtl:function(e,t){!function(){e.exports=this.lodash}()},gf1k:function(e,t){!function(){e.exports=this.itsec.dashboard.dashboard}()},l3Sj:function(e,t){!function(){e.exports=this.wp.i18n}()},pVnL:function(e,t){function r(){return e.exports=r=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},r.apply(this,arguments)}e.exports=r},xf52:function(e,t,r){"use strict";r.r(t);var n=r("GRId"),a=r("l3Sj"),c=r("TvNi"),o=r("1ZqX"),i=r("ppSj"),s=r("YLtl"),u=r("FqII"),l=r("gf1k"),f=r("Td6G");r("B6iu");var d={render:Object(o.withDispatch)((function(e){return{addNotice:function(t,r){e("core/notices").createSuccessNotice(t,{id:r,context:"ithemes-security"}),setTimeout((function(){return e("core/notices").removeNotice(r,"ithemes-security")}),1e4)}}}))((function(e){var t=e.card,r=e.config,c=e.addNotice,o=function(e,t){e.endsWith("/backup")&&c(t.message,"backup-complete")};return Object(s.isEmpty)(t.data)?Object(n.createElement)("div",{className:"itsec-card--type-database-backup itsec-card-database-backup--no-data"},Object(n.createElement)(l.CardHeader,null,Object(n.createElement)(l.CardHeaderTitle,{card:t,config:r})),Object(n.createElement)("section",{className:"itsec-card-database-backup__no-data-message"},Object(n.createElement)("p",null,Object(a.__)("Enable database logging or file backups to see a history of completed backups.","better-wp-security"))),Object(n.createElement)(l.CardFooterSchemaActions,{card:t,onComplete:o})):Object(n.createElement)("div",{className:"itsec-card--type-database-backup itsec-card-database-backup--source-".concat(t.data.source)},Object(n.createElement)(l.CardHeader,null,Object(n.createElement)(l.CardHeaderTitle,{card:t,config:r})),Object(n.createElement)("section",{className:"itsec-card-database-backup__total"},Object(n.createElement)("span",{className:"itsec-card-database-backup__total-count"},Object(f.m)(t.data.total),100===t.data.total&&Object(n.createElement)("sup",null,"+")),Object(n.createElement)("span",{className:"itsec-card-database-backup__total-label"},Object(a.__)("Backups","better-wp-security"))),t.data.backups.length>0&&Object(n.createElement)("section",{className:"itsec-card-database-backup__recent-backups-section","aria-label":Object(a.__)("Recent Backups","better-wp-security")},Object(n.createElement)("table",{className:"itsec-card-database-backup__recent-backups"},Object(n.createElement)("thead",null,Object(n.createElement)("tr",null,Object(n.createElement)("th",{scope:"column",className:"itsec-card-database-backup__col-date"},Object(a.__)("Date","better-wp-security")),Object(n.createElement)("th",{scope:"column",className:"itsec-card-database-backup__col-size"},Object(a.__)("Size","better-wp-security")),"files"===t.data.source&&Object(n.createElement)("th",{scope:"column",className:"itsec-card-database-backup__col-actions"},Object(n.createElement)("span",{className:"screen-reader-text"},Object(a.__)("Download","better-wp-security"))))),Object(n.createElement)("tbody",null,Object(s.take)(t.data.backups,50).map((function(e){return Object(n.createElement)("tr",{key:e.url||e.time},Object(n.createElement)("th",{scope:"row",className:"itsec-card-database-backup__col-date"},Object(n.createElement)("span",{className:"itsec-card-database-backup__backup-date"},Object(u.dateI18n)("M d, Y",e.time))," ",Object(n.createElement)("span",{className:"itsec-card-database-backup__backup-time"},Object(u.dateI18n)("g:i A",e.time))),Object(n.createElement)("td",{className:"itsec-card-database-backup__col-size"},e.size_format),"files"===t.data.source&&Object(n.createElement)("td",{className:"itsec-card-database-backup__col-actions"},e.url&&Object(n.createElement)("a",{href:e.url,download:!0},Object(a.__)("Download","better-wp-security"))))}))))),Object(n.createElement)(l.CardFooterSchemaActions,{card:t,onComplete:o}))})),elementQueries:[{type:"width",dir:"max",px:300},{type:"width",dir:"max",px:250},{type:"height",dir:"max",px:300}]};function b(){var e=Object(o.useDispatch)("ithemes-security/dashboard").registerCard;return Object(i.f)(b,(function(){return e("database-backup",d)})),null}r.p=window.itsecWebpackPublicPath,Object(a.setLocaleData)({"":{}},"ithemes-security-pro"),Object(c.registerPlugin)("itsec-backup-dashboard",{render:function(){return Object(n.createElement)(b,null)}})}},[["xf52",0,1,2]]]);