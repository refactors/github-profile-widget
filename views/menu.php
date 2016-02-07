<div class="wrap">
	<form method="post">
		<input type="hidden" name="action" value="saveconfiguration">
		<h2>Github Profile Widget Setting</h2>
		<table class="form-table">
		<tr>
			<th>Google Fonts Accelerate for Chinese Vistors</th>
			<td>
				<select name="google_fonts">
				<option value="0">Google Original</option>
				<option value="1"<?=$google_fonts==1?' selected="selected"':''?>>Chinese CDN</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" class="button button-primary" value="Save"></td>
			<td></td>
		</tr>
		</table>
	</form>
</div>