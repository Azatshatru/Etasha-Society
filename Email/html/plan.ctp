<table border="0" cellpadding="0" cellspacing="1" style="font:normal 13px arial; width:100%; max-width:750px;">
<tr><td colspan="2" align="center" style="border:1px solid #c59d45;"></td></tr></br>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Name</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->name ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Organisation</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->organisation ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Profession</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->profession ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Visit Date</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= date('d-m-y',strtotime($enquiry->visit_date)) ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Visit Purpose</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->visit_purpush ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>How did you hear about ETASHA?</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->about_first ?>
	</td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Comment</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
	<?= $enquiry->comment ?>
	</td>
</tr>
</table>