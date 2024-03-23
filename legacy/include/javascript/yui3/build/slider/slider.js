/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 3.3.0
build: 3167
*/
YUI.add("slider-base",function(c){var b=c.Attribute.INVALID_VALUE;function a(){a.superclass.constructor.apply(this,arguments);}c.SliderBase=c.extend(a,c.Widget,{initializer:function(){this.axis=this.get("axis");this._key={dim:(this.axis==="y")?"height":"width",minEdge:(this.axis==="y")?"top":"left",maxEdge:(this.axis==="y")?"bottom":"right",xyIndex:(this.axis==="y")?1:0};this.publish("thumbMove",{defaultFn:this._defThumbMoveFn,queuable:true});},renderUI:function(){var d=this.get("contentBox");this.rail=this.renderRail();this._uiSetRailLength(this.get("length"));this.thumb=this.renderThumb();this.rail.appendChild(this.thumb);d.appendChild(this.rail);d.addClass(this.getClassName(this.axis));},renderRail:function(){var e=this.getClassName("rail","cap",this._key.minEdge),d=this.getClassName("rail","cap",this._key.maxEdge);return c.Node.create(c.substitute(this.RAIL_TEMPLATE,{railClass:this.getClassName("rail"),railMinCapClass:e,railMaxCapClass:d}));},_uiSetRailLength:function(d){this.rail.setStyle(this._key.dim,d);},renderThumb:function(){this._initThumbUrl();var d=this.get("thumbUrl");return c.Node.create(c.substitute(this.THUMB_TEMPLATE,{thumbClass:this.getClassName("thumb"),thumbShadowClass:this.getClassName("thumb","shadow"),thumbImageClass:this.getClassName("thumb","image"),thumbShadowUrl:d,thumbImageUrl:d}));},bindUI:function(){this._bindThumbDD();this._bindValueLogic();this.after("disabledChange",this._afterDisabledChange);this.after("lengthChange",this._afterLengthChange);},_bindThumbDD:function(){var d={constrain:this.rail};d["stick"+this.axis.toUpperCase()]=true;this._dd=new c.DD.Drag({node:this.thumb,bubble:false,on:{"drag:start":c.bind(this._onDragStart,this)},after:{"drag:drag":c.bind(this._afterDrag,this),"drag:end":c.bind(this._afterDragEnd,this)}});this._dd.plug(c.Plugin.DDConstrained,d);},_bindValueLogic:function(){},_uiMoveThumb:function(d){if(this.thumb){this.thumb.setStyle(this._key.minEdge,d+"px");this.fire("thumbMove",{offset:d});}},_onDragStart:function(d){this.fire("slideStart",{ddEvent:d});},_afterDrag:function(f){var g=f.info.xy[this._key.xyIndex],d=f.target.con._regionCache[this._key.minEdge];this.fire("thumbMove",{offset:(g-d),ddEvent:f});},_afterDragEnd:function(d){this.fire("slideEnd",{ddEvent:d});},_afterDisabledChange:function(d){this._dd.set("lock",d.newVal);},_afterLengthChange:function(d){if(this.get("rendered")){this._uiSetRailLength(d.newVal);this.syncUI();}},syncUI:function(){this._dd.con.resetCache();this._syncThumbPosition();},_syncThumbPosition:function(){},_setAxis:function(d){d=(d+"").toLowerCase();return(d==="x"||d==="y")?d:b;},_setLength:function(e){e=(e+"").toLowerCase();var f=parseFloat(e,10),d=e.replace(/[\d\.\-]/g,"")||this.DEF_UNIT;return f>0?(f+d):b;},_initThumbUrl:function(){if(!this.get("thumbUrl")){var e=this.getSkinName()||"sam",d=c.config.base;if(d.indexOf("http://yui.yahooapis.com/combo")===0){d="http://yui.yahooapis.com/"+c.version+"/build/";}this.set("thumbUrl",d+"slider/assets/skins/"+e+"/thumb-"+this.axis+".png");}},BOUNDING_TEMPLATE:"<span></span>",CONTENT_TEMPLATE:"<span></span>",RAIL_TEMPLATE:'<span class="{railClass}">'+'<span class="{railMinCapClass}"></span>'+'<span class="{railMaxCapClass}"></span>'+"</span>",THUMB_TEMPLATE:'<span class="{thumbClass}" tabindex="-1">'+'<img src="{thumbShadowUrl}" '+'alt="Slider thumb shadow" '+'class="{thumbShadowClass}">'+'<img src="{thumbImageUrl}" '+'alt="Slider thumb" '+'class="{thumbImageClass}">'+"</span>"},{NAME:"sliderBase",ATTRS:{axis:{value:"x",writeOnce:true,setter:"_setAxis",lazyAdd:false},length:{value:"150px",setter:"_setLength"},thumbUrl:{value:null,validator:c.Lang.isString}}});},"3.3.0",{requires:["widget","substitute","dd-constrain"]});YUI.add("slider-value-range",function(f){var b="min",e="max",d="value",c=Math.round;function a(){this._initSliderValueRange();}f.SliderValueRange=f.mix(a,{prototype:{_factor:1,_initSliderValueRange:function(){},_bindValueLogic:function(){this.after({minChange:this._afterMinChange,maxChange:this._afterMaxChange,valueChange:this._afterValueChange});},_syncThumbPosition:function(){this._calculateFactor();this._setPosition(this.get(d));},_calculateFactor:function(){var j=this.get("length"),h=this.thumb.getStyle(this._key.dim),i=this.get(b),g=this.get(e);j=parseFloat(j,10)||150;h=parseFloat(h,10)||15;this._factor=(g-i)/(j-h);},_defThumbMoveFn:function(i){var g=this.get(d),h=this._offsetToValue(i.offset);if(g!==h){this.set(d,h,{positioned:true});}},_offsetToValue:function(h){var g=c(h*this._factor)+this.get(b);return c(this._nearestValue(g));},_valueToOffset:function(g){var h=c((g-this.get(b))/this._factor);return h;},getValue:function(){return this.get(d);},setValue:function(g){return this.set(d,g);},_afterMinChange:function(g){this._verifyValue();this._syncThumbPosition();},_afterMaxChange:function(g){this._verifyValue();this._syncThumbPosition();},_verifyValue:function(){var h=this.get(d),g=this._nearestValue(h);if(h!==g){this.set(d,g);}},_afterValueChange:function(g){if(!g.positioned){this._setPosition(g.newVal);}},_setPosition:function(g){this._uiMoveThumb(this._valueToOffset(g));},_validateNewMin:function(g){return f.Lang.isNumber(g);},_validateNewMax:function(g){return f.Lang.isNumber(g);},_setNewValue:function(g){return c(this._nearestValue(g));},_nearestValue:function(j){var i=this.get(b),g=this.get(e),h;h=(g>i)?g:i;i=(g>i)?i:g;g=h;return(j<i)?i:(j>g)?g:j;}},ATTRS:{min:{value:0,validator:"_validateNewMin"},max:{value:100,validator:"_validateNewMax"},value:{value:0,setter:"_setNewValue"}}},true);},"3.3.0",{requires:["slider-base"]});YUI.add("clickable-rail",function(b){function a(){this._initClickableRail();}b.ClickableRail=b.mix(a,{prototype:{_initClickableRail:function(){this._evtGuid=this._evtGuid||(b.guid()+"|");this.publish("railMouseDown",{defaultFn:this._defRailMouseDownFn});this.after("render",this._bindClickableRail);this.on("destroy",this._unbindClickableRail);},_bindClickableRail:function(){this._dd.addHandle(this.rail);this.rail.on(this._evtGuid+b.DD.Drag.START_EVENT,b.bind(this._onRailMouseDown,this));
},_unbindClickableRail:function(){if(this.get("rendered")){var c=this.get("contentBox"),d=c.one("."+this.getClassName("rail"));d.detach(this.evtGuid+"*");}},_onRailMouseDown:function(c){if(this.get("clickableRail")&&!this.get("disabled")){this.fire("railMouseDown",{ev:c});}},_defRailMouseDownFn:function(k){k=k.ev;var c=this._resolveThumb(k),g=this._key.xyIndex,h=parseFloat(this.get("length"),10),f,d,j;if(c){f=c.get("dragNode");d=parseFloat(f.getStyle(this._key.dim),10);j=this._getThumbDestination(k,f);j=j[g]-this.rail.getXY()[g];j=Math.min(Math.max(j,0),(h-d));this._uiMoveThumb(j);k.target=this.thumb.one("img")||this.thumb;c._handleMouseDownEvent(k);}},_resolveThumb:function(c){return this._dd;},_getThumbDestination:function(g,f){var d=f.get("offsetWidth"),c=f.get("offsetHeight");return[(g.pageX-Math.round((d/2))),(g.pageY-Math.round((c/2)))];}},ATTRS:{clickableRail:{value:true,validator:b.Lang.isBoolean}}},true);},"3.3.0",{requires:["slider-base"]});YUI.add("range-slider",function(a){a.Slider=a.Base.build("slider",a.SliderBase,[a.SliderValueRange,a.ClickableRail]);},"3.3.0",{requires:["slider-base","clickable-rail","slider-value-range"]});YUI.add("slider",function(a){},"3.3.0",{use:["slider-base","slider-value-range","clickable-rail","range-slider"]});