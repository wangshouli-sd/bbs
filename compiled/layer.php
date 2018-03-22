<table id="gogogo" cellspacing="0" cellpadding="0" class="popupcredit">
	<tr>
		<td class="pc_l">&nbsp;</td>
		<td class="pc_c"><div class="pc_inner"><i><?php echo $msg; ?></i><span>金钱<em>+<?php echo $money; ?></em></span></div></td>
		<td class="pc_r">&nbsp;</td>
	</tr>
</table>
<style>
	.absolute{
		z-index:20;
		left:50%;/*ff ie7*/
		top:50%;/*ff ie7*/
		
		margin-left:-100px!important;/*ff ie7 该值为本身宽的一半 */
		margin-top:-60px!important;/*ff ie7 该值为本身高的一半*/
		
		margin-top:0px;
		
		position:fixed!important;/*ff ie7*/
		position:absolute;/*ie6*/
		
		_top:       expression(eval(document.compatmode &&
					document.compatmode=='css1compat') ?
					documentelement.scrolltop + (document.documentelement.clientheight-this.offsetheight)/2 :/*ie6*/
					document.body.scrolltop + (document.body.clientheight - this.clientheight)/2);/*ie5 ie5.5*/

	}
</style>
<script>
showPrompt();
function showPrompt() {
	var O = 100;
	var A = 50;
			var fadeOut = function(O) {
				if(O == 0) {
					clearTimeout(fadeOutTimer);
					document.getElementById('gogogo').style.display='none';
					return;
				}
				document.getElementById('gogogo').style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + O + ')';
				document.getElementById('gogogo').style.opacity = O / 100;
				document.getElementById('gogogo').className = 'absolute';
				document.getElementById('gogogo').style.top = A+'%';
				O -= 10;
				A -= 0.5;
				var fadeOutTimer = setTimeout(function () {
					fadeOut(O);
				}, 200);
			};
	fadeOut(O);
}
</script>