!function(t){var e={};function n(o){if(e[o])return e[o].exports;var r=e[o]={i:o,l:!1,exports:{}};return t[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,o){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:o})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(o,r,function(e){return t[e]}.bind(null,r));return o},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=37)}([function(t,e){!function(){t.exports=this.wp.element}()},,function(t,e){t.exports=function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}},,,function(t,e){!function(){t.exports=this.lodash}()},function(t,e,n){var o;
/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/!function(){"use strict";var n={}.hasOwnProperty;function r(){for(var t=[],e=0;e<arguments.length;e++){var o=arguments[e];if(o){var i=typeof o;if("string"===i||"number"===i)t.push(o);else if(Array.isArray(o)&&o.length){var s=r.apply(null,o);s&&t.push(s)}else if("object"===i)for(var a in o)n.call(o,a)&&o[a]&&t.push(a)}}return t.join(" ")}t.exports?(r.default=r,t.exports=r):void 0===(o=function(){return r}.apply(e,[]))||(t.exports=o)}()},function(t,e){function n(e){return t.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},n(e)}t.exports=n},,function(t,e){function n(){return t.exports=n=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t},n.apply(this,arguments)}t.exports=n},,function(t,e,n){var o=n(21);t.exports=function(t,e){if(null==t)return{};var n,r,i=o(t,e);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);for(r=0;r<s.length;r++)n=s[r],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(i[n]=t[n])}return i}},function(t,e){t.exports=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e){function n(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}t.exports=function(t,e,o){return e&&n(t.prototype,e),o&&n(t,o),t}},function(t,e,n){var o=n(22);t.exports=function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&o(t,e)}},function(t,e,n){var o=n(23),r=n(2);t.exports=function(t,e){return!e||"object"!==o(e)&&"function"!=typeof e?r(t):e}},function(t,e){t.exports=function(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}},,,,,function(t,e){t.exports=function(t,e){if(null==t)return{};var n,o,r={},i=Object.keys(t);for(o=0;o<i.length;o++)n=i[o],e.indexOf(n)>=0||(r[n]=t[n]);return r}},function(t,e){function n(e,o){return t.exports=n=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},n(e,o)}t.exports=n},function(t,e){function n(e){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?t.exports=n=function(t){return typeof t}:t.exports=n=function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(e)}t.exports=n},,,,,,,,,,,,,,function(t,e,n){"use strict";n.r(e),n.d(e,"link",(function(){return gn}));var o=n(11),r=n.n(o),i=n(16),s=n.n(i),a=n(12),l=n.n(a),c=n(13),u=n.n(c),p=n(2),f=n.n(p),d=n(14),h=n.n(d),g=n(15),v=n.n(g),b=n(7),y=n.n(b),m=n(0),w=n(5),k=n(9),O=n.n(k),S=wp.url,j=S.getProtocol,L=S.isValidProtocol,R=S.getAuthority,E=S.isValidAuthority,C=S.getPath,P=S.isValidPath,x=S.getQueryString,N=S.isValidQueryString,_=S.getFragment,F=S.isValidFragment,T=wp.i18n,D=T.__,A=T.sprintf;function W(t){if(!t)return!1;var e=t.trim();if(!e)return!1;if(/^\S+:/.test(e)){var n=j(e);if(!L(n))return!1;if(Object(w.startsWith)(n,"http")&&!/^https?:\/\/[^\/\s]/i.test(e))return!1;var o=R(e);if(!E(o))return!1;var r=C(e);if(r&&!P(r))return!1;var i=x(e);if(i&&!N(i))return!1;var s=_(e);if(s&&!F(s))return!1}return!(Object(w.startsWith)(e,"#")&&!F(e))}function I(t){var e=t.url,n=t.opensInNewWindow,o=t.noFollow,r=t.sponsored,i=t.ugc,s=t.text,a={type:"core/link",attributes:{url:e}},l=[];if(n){var c=A(D("%s (opens in a new tab)","all-in-one-seo-pack"),s);a.attributes.target="_blank",a.attributes["aria-label"]=c,l.push("noreferrer noopener")}return o&&l.push("nofollow"),r&&l.push("sponsored"),i&&l.push("ugc"),l.length>0&&(a.attributes.rel=l.join(" ")),a}function V(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,o=y()(t);if(e){var r=y()(this).constructor;n=Reflect.construct(o,arguments,r)}else n=o.apply(this,arguments);return v()(this,n)}}var M=wp.element.Component,U=wp.dom,K=U.getOffsetParent,B=U.getRectangleFromRange;function H(){var t=window.getSelection();if(0===t.rangeCount)return{};var e=B(t.getRangeAt(0)),n=e.top+e.height,o=e.left+e.width/2,r=K(t.anchorNode);if(r){var i=r.getBoundingClientRect();n-=i.top,o-=i.left}return{top:n,left:o}}var z=function(t){h()(n,t);var e=V(n);function n(){var t;return l()(this,n),(t=e.apply(this,arguments)).state={style:H()},t}return u()(n,[{key:"render",value:function(){var t=this.props.children,e=this.state.style;return Object(m.createElement)("div",{className:"editor-format-toolbar__selection-position",style:e},t)}}]),n}(M),q=n(6),Q=n.n(q);function $(t){return($="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function G(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function X(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,o)}return n}function Y(t,e){var n=t["page".concat(e?"Y":"X","Offset")],o="scroll".concat(e?"Top":"Left");if("number"!=typeof n){var r=t.document;"number"!=typeof(n=r.documentElement[o])&&(n=r.body[o])}return n}function J(t){return Y(t)}function Z(t){return Y(t,!0)}function tt(t){var e=function(t){var e,n,o,r=t.ownerDocument,i=r.body,s=r&&r.documentElement;return n=(e=t.getBoundingClientRect()).left,o=e.top,{left:n-=s.clientLeft||i.clientLeft||0,top:o-=s.clientTop||i.clientTop||0}}(t),n=t.ownerDocument,o=n.defaultView||n.parentWindow;return e.left+=J(o),e.top+=Z(o),e}var et,nt=new RegExp("^(".concat(/[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,")(?!px)[a-z%]+$"),"i"),ot=/^(top|right|bottom|left)$/,rt="left";function it(t,e){for(var n=0;n<t.length;n++)e(t[n])}function st(t){return"border-box"===et(t,"boxSizing")}"undefined"!=typeof window&&(et=window.getComputedStyle?function(t,e,n){var o="",r=t.ownerDocument,i=n||r.defaultView.getComputedStyle(t,null);return i&&(o=i.getPropertyValue(e)||i[e]),o}:function(t,e){var n=t.currentStyle&&t.currentStyle[e];if(nt.test(n)&&!ot.test(e)){var o=t.style,r=o[rt],i=t.runtimeStyle[rt];t.runtimeStyle[rt]=t.currentStyle[rt],o[rt]="fontSize"===e?"1em":n||0,n=o.pixelLeft+"px",o[rt]=r,t.runtimeStyle[rt]=i}return""===n?"auto":n});var at=["margin","border","padding"];function lt(t,e,n){var o,r={},i=t.style;for(o in e)e.hasOwnProperty(o)&&(r[o]=i[o],i[o]=e[o]);for(o in n.call(t),e)e.hasOwnProperty(o)&&(i[o]=r[o])}function ct(t,e,n){var o,r,i,s=0;for(r=0;r<e.length;r++)if(o=e[r])for(i=0;i<n.length;i++){var a=void 0;a="border"===o?"".concat(o+n[i],"Width"):o+n[i],s+=parseFloat(et(t,a))||0}return s}function ut(t){return null!=t&&t==t.window}var pt={};function ft(t,e,n){if(ut(t))return"width"===e?pt.viewportWidth(t):pt.viewportHeight(t);if(9===t.nodeType)return"width"===e?pt.docWidth(t):pt.docHeight(t);var o="width"===e?["Left","Right"]:["Top","Bottom"],r="width"===e?t.offsetWidth:t.offsetHeight,i=(et(t),st(t)),s=0;(null==r||r<=0)&&(r=void 0,(null==(s=et(t,e))||Number(s)<0)&&(s=t.style[e]||0),s=parseFloat(s)||0),void 0===n&&(n=i?1:-1);var a=void 0!==r||i,l=r||s;if(-1===n)return a?l-ct(t,["border","padding"],o):s;if(a){var c=2===n?-ct(t,["border"],o):ct(t,["margin"],o);return l+(1===n?0:c)}return s+ct(t,at.slice(n),o)}it(["Width","Height"],(function(t){pt["doc".concat(t)]=function(e){var n=e.document;return Math.max(n.documentElement["scroll".concat(t)],n.body["scroll".concat(t)],pt["viewport".concat(t)](n))},pt["viewport".concat(t)]=function(e){var n="client".concat(t),o=e.document,r=o.body,i=o.documentElement[n];return"CSS1Compat"===o.compatMode&&i||r&&r[n]||i}}));var dt={position:"absolute",visibility:"hidden",display:"block"};function ht(t){var e,n=arguments;return 0!==t.offsetWidth?e=ft.apply(void 0,n):lt(t,dt,(function(){e=ft.apply(void 0,n)})),e}function gt(t,e,n){var o=n;if("object"!==$(e))return void 0!==o?("number"==typeof o&&(o+="px"),void(t.style[e]=o)):et(t,e);for(var r in e)e.hasOwnProperty(r)&&gt(t,r,e[r])}it(["width","height"],(function(t){var e=t.charAt(0).toUpperCase()+t.slice(1);pt["outer".concat(e)]=function(e,n){return e&&ht(e,t,n?0:1)};var n="width"===t?["Left","Right"]:["Top","Bottom"];pt[t]=function(e,o){if(void 0===o)return e&&ht(e,t,-1);if(e){et(e);return st(e)&&(o+=ct(e,["padding","border"],n)),gt(e,t,o)}}}));var vt=function(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?X(n,!0).forEach((function(e){G(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):X(n).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}({getWindow:function(t){var e=t.ownerDocument||t;return e.defaultView||e.parentWindow},offset:function(t,e){if(void 0===e)return tt(t);!function(t,e){"static"===gt(t,"position")&&(t.style.position="relative");var n,o,r=tt(t),i={};for(o in e)e.hasOwnProperty(o)&&(n=parseFloat(gt(t,o))||0,i[o]=n+e[o]-r[o]);gt(t,i)}(t,e)},isWindow:ut,each:it,css:gt,clone:function(t){var e={};for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);if(t.overflow)for(var o in t)t.hasOwnProperty(o)&&(e.overflow[o]=t.overflow[o]);return e},scrollLeft:function(t,e){if(ut(t)){if(void 0===e)return J(t);window.scrollTo(e,Z(t))}else{if(void 0===e)return t.scrollLeft;t.scrollLeft=e}},scrollTop:function(t,e){if(ut(t)){if(void 0===e)return Z(t);window.scrollTo(J(t),e)}else{if(void 0===e)return t.scrollTop;t.scrollTop=e}},viewportWidth:0,viewportHeight:0},pt);var bt=function(t,e,n){n=n||{},9===e.nodeType&&(e=vt.getWindow(e));var o=n.allowHorizontalScroll,r=n.onlyScrollIfNeeded,i=n.alignWithTop,s=n.alignWithLeft,a=n.offsetTop||0,l=n.offsetLeft||0,c=n.offsetBottom||0,u=n.offsetRight||0;o=void 0===o||o;var p,f,d,h,g,v,b,y,m,w,k=vt.isWindow(e),O=vt.offset(t),S=vt.outerHeight(t),j=vt.outerWidth(t);k?(b=e,w=vt.height(b),m=vt.width(b),y={left:vt.scrollLeft(b),top:vt.scrollTop(b)},g={left:O.left-y.left-l,top:O.top-y.top-a},v={left:O.left+j-(y.left+m)+u,top:O.top+S-(y.top+w)+c},h=y):(p=vt.offset(e),f=e.clientHeight,d=e.clientWidth,h={left:e.scrollLeft,top:e.scrollTop},g={left:O.left-(p.left+(parseFloat(vt.css(e,"borderLeftWidth"))||0))-l,top:O.top-(p.top+(parseFloat(vt.css(e,"borderTopWidth"))||0))-a},v={left:O.left+j-(p.left+d+(parseFloat(vt.css(e,"borderRightWidth"))||0))+u,top:O.top+S-(p.top+f+(parseFloat(vt.css(e,"borderBottomWidth"))||0))+c}),g.top<0||v.top>0?!0===i?vt.scrollTop(e,h.top+g.top):!1===i?vt.scrollTop(e,h.top+v.top):g.top<0?vt.scrollTop(e,h.top+g.top):vt.scrollTop(e,h.top+v.top):r||((i=void 0===i||!!i)?vt.scrollTop(e,h.top+g.top):vt.scrollTop(e,h.top+v.top)),o&&(g.left<0||v.left>0?!0===s?vt.scrollLeft(e,h.left+g.left):!1===s?vt.scrollLeft(e,h.left+v.left):g.left<0?vt.scrollLeft(e,h.left+g.left):vt.scrollLeft(e,h.left+v.left):r||((s=void 0===s||!!s)?vt.scrollLeft(e,h.left+g.left):vt.scrollLeft(e,h.left+v.left)))};function yt(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,o=y()(t);if(e){var r=y()(this).constructor;n=Reflect.construct(o,arguments,r)}else n=o.apply(this,arguments);return v()(this,n)}}var mt=wp.i18n,wt=mt.__,kt=mt.sprintf,Ot=mt._n,St=wp.element,jt=St.Component,Lt=St.createRef,Rt=wp.htmlEntities.decodeEntities,Et=wp.keycodes,Ct=Et.UP,Pt=Et.DOWN,xt=Et.ENTER,Nt=Et.TAB,_t=wp.components,Ft=_t.Spinner,Tt=_t.withSpokenMessages,Dt=_t.Popover,At=wp.compose.withInstanceId,Wt=wp.apiFetch,It=wp.url.addQueryArgs,Vt=function(t){return t.stopPropagation()},Mt=Tt(At(function(t){h()(n,t);var e=yt(n);function n(t){var o,r=t.autocompleteRef;return l()(this,n),(o=e.apply(this,arguments)).onChange=o.onChange.bind(f()(o)),o.onKeyDown=o.onKeyDown.bind(f()(o)),o.autocompleteRef=r||Lt(),o.inputRef=Lt(),o.updateSuggestions=Object(w.throttle)(o.updateSuggestions.bind(f()(o)),200),o.suggestionNodes=[],o.state={posts:[],showSuggestions:!1,selectedSuggestion:null},o}return u()(n,[{key:"componentDidUpdate",value:function(){var t=this,e=this.state,n=e.showSuggestions,o=e.selectedSuggestion;n&&null!==o&&!this.scrollingIntoView&&(this.scrollingIntoView=!0,bt(this.suggestionNodes[o],this.autocompleteRef.current,{onlyScrollIfNeeded:!0}),setTimeout((function(){t.scrollingIntoView=!1}),100))}},{key:"componentWillUnmount",value:function(){delete this.suggestionsRequest}},{key:"bindSuggestionNode",value:function(t){var e=this;return function(n){e.suggestionNodes[t]=n}}},{key:"updateSuggestions",value:function(t){var e=this;if(t.length<2||/^https?:/.test(t))this.setState({showSuggestions:!1,selectedSuggestion:null,loading:!1});else{this.setState({showSuggestions:!0,selectedSuggestion:null,loading:!0});var n=Wt({path:It("/wp/v2/search",{search:t,per_page:20,type:"post"})});n.then((function(t){e.suggestionsRequest===n&&(e.setState({posts:t,loading:!1}),t.length?e.props.debouncedSpeak(kt(Ot("%d result found, use up and down arrow keys to navigate.","%d results found, use up and down arrow keys to navigate.",t.length),t.length),"assertive"):e.props.debouncedSpeak(wt("No results.","all-in-one-seo-pack"),"assertive"))})).catch((function(){e.suggestionsRequest===n&&e.setState({loading:!1})})),this.suggestionsRequest=n}}},{key:"onChange",value:function(t){var e=t.target.value;this.props.onChange(e),this.updateSuggestions(e)}},{key:"onKeyDown",value:function(t){var e=this.state,n=e.showSuggestions,o=e.selectedSuggestion,r=e.posts,i=e.loading;if(n&&r.length&&!i){var s=this.state.posts[this.state.selectedSuggestion];switch(t.keyCode){case Ct:t.stopPropagation(),t.preventDefault();var a=o?o-1:r.length-1;this.setState({selectedSuggestion:a});break;case Pt:t.stopPropagation(),t.preventDefault();var l=null===o||o===r.length-1?0:o+1;this.setState({selectedSuggestion:l});break;case Nt:null!==this.state.selectedSuggestion&&(this.selectLink(s),this.props.speak(wt("Link selected.","all-in-one-seo-pack")));break;case xt:null!==this.state.selectedSuggestion&&(t.stopPropagation(),this.selectLink(s))}}else switch(t.keyCode){case Ct:0!==t.target.selectionStart&&(t.stopPropagation(),t.preventDefault(),t.target.setSelectionRange(0,0));break;case Pt:this.props.value.length!==t.target.selectionStart&&(t.stopPropagation(),t.preventDefault(),t.target.setSelectionRange(this.props.value.length,this.props.value.length))}}},{key:"selectLink",value:function(t){this.props.onChange(t.url,t),this.setState({selectedSuggestion:null,showSuggestions:!1})}},{key:"handleOnClick",value:function(t){this.selectLink(t),this.inputRef.current.focus()}},{key:"render",value:function(){var t=this,e=this.props,n=e.value,o=void 0===n?"":n,r=e.autoFocus,i=void 0===r||r,s=e.instanceId,a=e.className,l=this.state,c=l.showSuggestions,u=l.posts,p=l.selectedSuggestion,f=l.loading;return Object(m.createElement)("div",{className:Q()("editor-url-input block-editor-url-input",a)},Object(m.createElement)("input",{autoFocus:i,type:"text","aria-label":wt("URL","all-in-one-seo-pack"),required:!0,value:o,onChange:this.onChange,onInput:Vt,placeholder:wt("Paste URL or type to search","all-in-one-seo-pack"),onKeyDown:this.onKeyDown,role:"combobox","aria-expanded":c,"aria-autocomplete":"list","aria-owns":"editor-url-input-suggestions-".concat(s),"aria-activedescendant":null!==p?"editor-url-input-suggestion-".concat(s,"-").concat(p):void 0,ref:this.inputRef}),f&&Object(m.createElement)(Ft,null),c&&!!u.length&&Object(m.createElement)(Dt,{position:"bottom",noArrow:!0,focusOnMount:!1},Object(m.createElement)("div",{className:Q()("editor-url-input__suggestions","block-editor-url-input__suggestions","".concat(a,"__suggestions")),id:"editor-url-input-suggestions-".concat(s),ref:this.autocompleteRef,role:"listbox"},u.map((function(e,n){return Object(m.createElement)("button",{key:e.id,role:"option",tabIndex:"-1",id:"editor-url-input-suggestion-".concat(s,"-").concat(n),ref:t.bindSuggestionNode(n),className:Q()("editor-url-input__suggestion block-editor-url-input__suggestion",{"is-selected":n===p}),onClick:function(){return t.handleOnClick(e)},"aria-selected":n===p},Rt(e.title)||wt("(no title)","all-in-one-seo-pack"))})))))}}]),n}(jt))),Ut=wp.i18n.__,Kt=wp.components.IconButton;function Bt(t){var e=t.autocompleteRef,n=t.className,o=t.onChangeInputValue,i=t.value,s=r()(t,["autocompleteRef","className","onChangeInputValue","value"]);return Object(m.createElement)("form",O()({className:Q()("block-editor-url-popover__link-editor",n)},s),Object(m.createElement)(Mt,{value:i,onChange:o,autocompleteRef:e}),Object(m.createElement)(Kt,{icon:"editor-break",label:Ut("Apply","all-in-one-seo-pack"),type:"submit"}))}var Ht=wp.i18n.__,zt=wp.components,qt=zt.ExternalLink,Qt=zt.IconButton,$t=wp.url,Gt=$t.safeDecodeURI,Xt=$t.filterURLForDisplay;function Yt(t){var e=t.url,n=t.urlLabel,o=t.className,r=Q()(o,"block-editor-url-popover__link-viewer-url");return e?Object(m.createElement)(qt,{className:r,href:e},n||Xt(Gt(e))):Object(m.createElement)("span",{className:r})}function Jt(t){var e=t.className,n=t.linkClassName,o=t.onEditLinkClick,i=t.url,s=t.urlLabel,a=r()(t,["className","linkClassName","onEditLinkClick","url","urlLabel"]);return Object(m.createElement)("div",O()({className:Q()("block-editor-url-popover__link-viewer",e)},a),Object(m.createElement)(Yt,{url:i,urlLabel:s,className:n}),o&&Object(m.createElement)(Qt,{icon:"edit",label:Ht("Edit","all-in-one-seo-pack"),onClick:o}))}function Zt(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,o=y()(t);if(e){var r=y()(this).constructor;n=Reflect.construct(o,arguments,r)}else n=o.apply(this,arguments);return v()(this,n)}}var te=wp.i18n.__,ee=wp.element,ne=ee.Component,oe=ee.createRef,re=ee.useMemo,ie=ee.Fragment,se=wp.components,ae=se.ToggleControl,le=se.withSpokenMessages,ce=wp.keycodes,ue=ce.LEFT,pe=ce.RIGHT,fe=ce.UP,de=ce.DOWN,he=ce.BACKSPACE,ge=ce.ENTER,ve=ce.ESCAPE,be=wp.dom.getRectangleFromRange,ye=wp.url.prependHTTP,me=wp.richText,we=me.create,ke=me.insert,Oe=me.isCollapsed,Se=me.applyFormat,je=me.getTextContent,Le=me.slice,Re=wp.blockEditor.URLPopover,Ee=function(t){return t.stopPropagation()};function Ce(t,e){return t.addingLink||e.editLink}var Pe=function(t){var e=t.isActive,n=t.addingLink,o=t.value,i=t.resetOnMount,s=r()(t,["isActive","addingLink","value","resetOnMount"]),a=re((function(){var t=window.getSelection(),e=t.rangeCount>0?t.getRangeAt(0):null;if(e){if(n)return be(e);var o=e.startContainer;for(o=o.nextElementSibling||o;o.nodeType!==window.Node.ELEMENT_NODE;)o=o.parentNode;var r=o.closest("a");return r?r.getBoundingClientRect():void 0}}),[e,n,o.start,o.end]);return a?(i(a),Object(m.createElement)(Re,O()({anchorRect:a},s))):null},xe=le(function(t){h()(n,t);var e=Zt(n);function n(){var t;return l()(this,n),(t=e.apply(this,arguments)).editLink=t.editLink.bind(f()(t)),t.submitLink=t.submitLink.bind(f()(t)),t.onKeyDown=t.onKeyDown.bind(f()(t)),t.onChangeInputValue=t.onChangeInputValue.bind(f()(t)),t.setLinkTarget=t.setLinkTarget.bind(f()(t)),t.setNoFollow=t.setNoFollow.bind(f()(t)),t.setSponsored=t.setSponsored.bind(f()(t)),t.setUgc=t.setUgc.bind(f()(t)),t.onFocusOutside=t.onFocusOutside.bind(f()(t)),t.resetState=t.resetState.bind(f()(t)),t.autocompleteRef=oe(),t.resetOnMount=t.resetOnMount.bind(f()(t)),t.state={opensInNewWindow:!1,noFollow:!1,sponsored:!1,ugc:!1,inputValue:"",anchorRect:!1},t}return u()(n,[{key:"onKeyDown",value:function(t){[ue,de,pe,fe,he,ge].indexOf(t.keyCode)>-1&&t.stopPropagation(),[ve].indexOf(t.keyCode)>-1&&this.resetState()}},{key:"onChangeInputValue",value:function(t){this.setState({inputValue:t})}},{key:"setLinkTarget",value:function(t){var e=this.props,n=e.activeAttributes.url,o=void 0===n?"":n,r=e.value,i=e.onChange;if(this.setState({opensInNewWindow:t}),!Ce(this.props,this.state)){var s=je(Le(r));i(Se(r,I({url:o,opensInNewWindow:t,noFollow:this.state.noFollow,sponsored:this.state.sponsored,ugc:this.state.ugc,text:s})))}}},{key:"setNoFollow",value:function(t){var e=this.props,n=e.activeAttributes.url,o=void 0===n?"":n,r=e.value,i=e.onChange;if(this.setState({noFollow:t}),!Ce(this.props,this.state)){var s=je(Le(r));i(Se(r,I({url:o,opensInNewWindow:this.state.opensInNewWindow,noFollow:t,sponsored:this.state.sponsored,ugc:this.state.ugc,text:s})))}}},{key:"setSponsored",value:function(t){var e=this.props,n=e.activeAttributes.url,o=void 0===n?"":n,r=e.value,i=e.onChange;if(this.setState({sponsored:t}),!Ce(this.props,this.state)){var s=je(Le(r));i(Se(r,I({url:o,opensInNewWindow:this.state.opensInNewWindow,noFollow:this.state.noFollow,sponsored:t,ugc:this.state.ugc,text:s})))}}},{key:"setUgc",value:function(t){var e=this.props,n=e.activeAttributes.url,o=void 0===n?"":n,r=e.value,i=e.onChange;if(this.setState({ugc:t}),!Ce(this.props,this.state)){var s=je(Le(r));i(Se(r,I({url:o,opensInNewWindow:this.state.opensInNewWindow,noFollow:this.state.noFollow,sponsored:this.state.sponsored,ugc:t,text:s})))}}},{key:"editLink",value:function(t){this.setState({editLink:!0}),t.preventDefault()}},{key:"submitLink",value:function(t){var e=this.props,n=e.isActive,o=e.value,r=e.onChange,i=e.speak,s=this.state,a=s.inputValue,l=s.opensInNewWindow,c=s.noFollow,u=s.sponsored,p=s.ugc,f=ye(a),d=I({url:f,opensInNewWindow:l,noFollow:c,sponsored:u,ugc:p,text:je(Le(o))});if(t.preventDefault(),Oe(o)&&!n){var h=Se(we({text:f}),d,0,f.length);r(ke(o,h))}else r(Se(o,d));this.resetState(),W(f)?i(te(n?"Link edited.":"Link inserted.","all-in-one-seo-pack"),"assertive"):i(te("Warning: the link has been inserted but could have errors. Please test it.","all-in-one-seo-pack"),"assertive")}},{key:"onFocusOutside",value:function(){var t=this.autocompleteRef.current;t&&t.contains(event.target)||this.resetState()}},{key:"resetState",value:function(){this.props.stopAddingLink(),this.setState({editLink:!1})}},{key:"resetOnMount",value:function(t){this.state.anchorRect!==t&&this.setState({opensInNewWindow:!1,noFollow:!1,sponsored:!1,ugc:!1,anchorRect:t})}},{key:"render",value:function(){var t=this,e=this.props,n=e.isActive,o=e.activeAttributes,r=o.url,i=(o.target,o.rel,e.addingLink),s=e.value;if(!n&&!i)return null;var a=this.state,l=a.inputValue,c=a.opensInNewWindow,u=a.noFollow,p=a.sponsored,f=a.ugc,d=Ce(this.props,this.state);return Object(m.createElement)(z,{key:"".concat(s.start).concat(s.end)},Object(m.createElement)(Pe,{resetOnMount:this.resetOnMount,value:s,isActive:n,addingLink:i,onFocusOutside:this.onFocusOutside,onClose:function(){l||t.resetState()},focusOnMount:!!d&&"firstElement",renderSettings:function(){return Object(m.createElement)(ie,null,Object(m.createElement)(ae,{label:te("Open in New Tab","all-in-one-seo-pack"),checked:c,onChange:t.setLinkTarget}),Object(m.createElement)(ae,{label:te('Add "nofollow" to link',"all-in-one-seo-pack"),checked:u,onChange:t.setNoFollow}),Object(m.createElement)(ae,{label:te('Add "sponsored" to link',"all-in-one-seo-pack"),checked:p,onChange:t.setSponsored}),Object(m.createElement)(ae,{label:te('Add "ugc" to link',"all-in-one-seo-pack"),checked:f,onChange:t.setUgc}))}},d?Object(m.createElement)(Bt,{className:"editor-format-toolbar__link-container-content block-editor-format-toolbar__link-container-content",value:l,onChangeInputValue:this.onChangeInputValue,onKeyDown:this.onKeyDown,onKeyPress:Ee,onSubmit:this.submitLink,autocompleteRef:this.autocompleteRef}):Object(m.createElement)(Jt,{className:"editor-format-toolbar__link-container-content block-editor-format-toolbar__link-container-content",onKeyPress:Ee,url:r,onEditLinkClick:this.editLink,linkClassName:W(ye(r))?void 0:"has-invalid-link"})))}}],[{key:"getDerivedStateFromProps",value:function(t,e){var n=t.activeAttributes,o=n.url,r=n.target,i=n.rel,s="_blank"===r,a={};if(!Ce(t,e)&&(o!==e.inputValue&&(a.inputValue=o),s!==e.opensInNewWindow&&(a.opensInNewWindow=s),"string"==typeof i)){var l=i.split(" ").includes("nofollow"),c=i.split(" ").includes("sponsored"),u=i.split(" ").includes("ugc");l!==e.noFollow&&(a.noFollow=l),c!==e.sponsored&&(a.sponsored=c),u!==e.ugc&&(a.ugc=u)}return a}}]),n}(ne));function Ne(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);e&&(o=o.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,o)}return n}function _e(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(t){return!1}}();return function(){var n,o=y()(t);if(e){var r=y()(this).constructor;n=Reflect.construct(o,arguments,r)}else n=o.apply(this,arguments);return v()(this,n)}}var Fe=wp.i18n.__,Te=wp.element,De=Te.Component,Ae=Te.Fragment,We=wp.data,Ie=We.select,Ve=We.withSelect,Me=(We.dispatch,wp.blockEditor),Ue=Me.BlockControls,Ke=Me.RichTextToolbarButton,Be=Me.RichTextShortcut,He=wp.richText,ze=He.getTextContent,qe=He.applyFormat,Qe=He.removeFormat,$e=He.slice,Ge=(He.getActiveFormat,wp.url.isURL),Xe=wp.components,Ye=Xe.Toolbar,Je=Xe.withSpokenMessages,Ze=wp.compose,tn=Ze.compose,en=Ze.ifCondition,nn=Fe("Add Link","all-in-one-seo-pack"),on=/^(mailto:)?[a-z0-9._%+-]+@[a-z0-9][a-z0-9.-]*\.[a-z]{2,63}$/i,rn=function(t){h()(n,t);var e=_e(n);function n(){var t;return l()(this,n),(t=e.apply(this,arguments)).isEmail=t.isEmail.bind(f()(t)),t.addLink=t.addLink.bind(f()(t)),t.stopAddingLink=t.stopAddingLink.bind(f()(t)),t.onRemoveFormat=t.onRemoveFormat.bind(f()(t)),t.state={addingLink:!1},t}return u()(n,[{key:"isEmail",value:function(t){return on.test(t)}},{key:"addLink",value:function(){var t=this.props,e=t.value,n=t.onChange,o=ze($e(e));o&&Ge(o)?n(qe(e,{type:"core/link",attributes:{url:o}})):o&&this.isEmail(o)?n(qe(e,{type:"core/link",attributes:{url:"mailto:".concat(o)}})):this.setState({addingLink:!0})}},{key:"stopAddingLink",value:function(){this.setState({addingLink:!1})}},{key:"onRemoveFormat",value:function(){var t=this.props,e=t.value,n=t.onChange,o=t.speak,r=e;Object(w.map)(["core/link"],(function(t){r=Qe(r,t)})),n(function(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?Ne(Object(n),!0).forEach((function(e){s()(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):Ne(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}({},r)),o(Fe("Link removed.","all-in-one-seo-pack"),"assertive")}},{key:"render",value:function(){var t=this.props,e=t.activeAttributes,n=t.onChange,o=this.props,r=o.isActive,i=o.value;return Object(m.createElement)(Ae,null,Object(m.createElement)(Ue,null,Object(m.createElement)(Ye,{className:"editorskit-components-toolbar"},Object(m.createElement)(Be,{type:"primary",character:"k",onUse:this.addLink}),Object(m.createElement)(Be,{type:"primaryShift",character:"k",onUse:this.onRemoveFormat}),r&&Object(m.createElement)(Ke,{name:"link",icon:"editor-unlink",title:Fe("Unlink","all-in-one-seo-pack"),onClick:this.onRemoveFormat,isActive:r,shortcutType:"primaryShift",shortcutCharacter:"k"}),!r&&Object(m.createElement)(Ke,{name:"link",icon:"admin-links",title:nn,onClick:this.addLink,isActive:r,shortcutType:"primary",shortcutCharacter:"k"}),Object(m.createElement)(xe,{addingLink:this.state.addingLink,stopAddingLink:this.stopAddingLink,isActive:r,activeAttributes:e,value:i,onChange:n}))))}}]),n}(De),sn=tn(Ve((function(){return{isDisabled:Ie("core/edit-post").isFeatureActive("disableEditorsKitLinkFormats")}})),en((function(t){return!t.isDisabled})),Je)(rn),an=wp.i18n.__,ln=wp.richText,cn=ln.registerFormatType,un=ln.unregisterFormatType,pn=ln.applyFormat,fn=ln.isCollapsed,dn=wp.htmlEntities.decodeEntities,hn=wp.url.isURL,gn={name:"core/link",title:an("Link","all-in-one-seo-pack"),tagName:"a",className:null,attributes:{url:"href",target:"target",rel:"rel"},__unstablePasteRule:function(t,e){var n=e.html,o=e.plainText;if(fn(t))return t;var r=(n||o).replace(/<[^>]+>/g,"").trim();return hn(r)?pn(t,{type:"core/link",attributes:{url:dn(r)}}):t},edit:sn};[gn].forEach((function(t){var e=t.name,n=r()(t,["name"]);e&&(un("core/link"),cn(e,n))}))}]);