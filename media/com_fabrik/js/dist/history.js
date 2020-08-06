/*! Fabrik */

var History=new Class({initialize:function(i,t){this.recording=!0,this.pointer=-1,document.id(i)&&document.id(i).addEvent("click",function(i){this.undo(i)}.bind(this)),document.id(t)&&document.id(t).addEvent("click",function(i){this.redo(i)}.bind(this)),Fabrik.addEvent("fabrik.history.on",function(i){this.on(i)}.bind(this)),Fabrik.addEvent("fabrik.history.off",function(i){this.off(i)}.bind(this)),Fabrik.addEvent("fabrik.history.add",function(i){this.add(i)}.bind(this)),this.history=[]},undo:function(){if(-1<this.pointer){this.off();var i=this.history[this.pointer],t=i.undofunc,n=i.undoparams;t.attempt(n,i.object);this.on(),this.pointer--}},redo:function(){if(this.pointer<this.history.length-1){this.pointer++,this.off();var i=this.history[this.pointer],t=i.redofunc,n=i.redoparams;t.attempt(n,i.object);this.on()}},add:function(i,t,n,o,s){if(this.recording){var r=this.history.filter(function(i,t){return t<=this.pointer}.bind(this));this.history=r,this.history.push({object:i,undofunc:t,undoparams:n,redofunc:o,redoparams:s}),this.pointer++}},on:function(){this.recording=!0},off:function(){this.recording=!1}});