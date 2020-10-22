<table border="0" cellpadding="0" cellspacing="1" style="font:normal 13px arial; width:100%; max-width:750px;">
<tr><td colspan="2" align="center" style="border:1px solid #c59d45;"></td></tr></br>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Name</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->name ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Email</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->email ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Phone no.</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->phone ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Donations Material</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->donations_material ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Drop & Pickup</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->drop_pickup ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Material Image</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<img src="<?php echo $imageRoot.$enquiry->material_image?>" style="width:120px;height:120px;">
	</td>
</tr>
</table>