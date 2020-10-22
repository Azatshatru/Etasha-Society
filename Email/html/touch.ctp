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
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Age</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->age ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Address</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->address ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Profession</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->profession ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Sex</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->sex ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>How did you hear about ETASHA? Image</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->about_first ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Would you like to receive our Newsletter Image</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->about_second ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Comment</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->comment ?>
	</td>
</tr>
</table>