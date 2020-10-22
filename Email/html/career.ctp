<table border="0" cellpadding="0" cellspacing="1" style="font:normal 13px arial; width:100%; max-width:750px;">
<tr><td colspan="2" align="center" style="border:1px solid #00a3b5; background:#00a3b5;"><h2 style="color:#fff; margin:8px 0;"><?= $sitename ?></h2></td></tr></br>
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
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->mobile ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Job Type</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->job_type ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Experience</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->experience ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Area Expertise</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->area_expertise ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Uploaded Document</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;">
        <?= (($enquiry->resume_path && file_exists($imageRoot.$enquiry->resume_path))?$this->Html->link('Download', 
                            $this->Url->build('/', true).$imageDir.$enquiry->resume_path, ['escape' => false, 'target' => '_blank']):'');?></td>
</tr>
</table>