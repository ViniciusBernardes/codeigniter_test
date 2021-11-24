/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

jQuery(function(){
	jQuery("#valor").maskMoney({symbol:'', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })