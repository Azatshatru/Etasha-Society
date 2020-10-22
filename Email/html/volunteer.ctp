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
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>D.O.B</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?=  date("d-m-Y",strtotime($enquiry->dob)) ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Address</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->address ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Qualification</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->qualification ?></td>
</tr><tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>College/University</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->college ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Company, Designation (for working volunteers)</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->company_detail ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Area of interest</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->interest ?></td>
</tr><tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Specific Skills</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->skill ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Languages - Spoken / Written</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->language ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>No. of weeks you can volunteer</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->week_no ?></td>
</tr><tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Willings to travel / stay outsation Y/N</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->travel ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Email</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->email ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>The month and week you can begin (if selected)</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->begin ?></td>
</tr><tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Any past experience of interning Y/N</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->experience ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Organizations Name</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->organization ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Location</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->location ?></td>
</tr><tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Duration Of internship</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->internship ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Nature of internship</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->internship_nature ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Project</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->project ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>How did you hear about ETASHA?</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->about_etasha ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Submitted by</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= $enquiry->submitted_by ?></td>
</tr>
<tr>
    <td style="border:1px solid #e8e8e8; padding:10px; color:#444; background:#f9f9f9;"><strong>Date</strong></td>
    <td style="border:1px solid #e8e8e8; padding:10px;"><?= date("d-m-Y",strtotime($enquiry->submitted_date)) ?></td>
</tr>
</table>