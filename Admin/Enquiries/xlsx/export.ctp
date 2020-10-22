<?php
$applicants = [];
foreach($enquiries as $enquiry)
{
    $applicants[] = [
        'Name' => $enquiry->name,
        'Email' => $enquiry->email,
        'Contact No.' => $enquiry->phone,
		'D.O.B' => date("d-mp-Y",strtotime($enquiry->dob)),
        'Address' => $enquiry->address,
        'Qualification' => $enquiry->qualification,
		'College/University' => $enquiry->college,
        'Company, Designation (for working volunteers)' => $enquiry->company_detail,
        'Area of interest' => $enquiry->interest,
		'Specific Skills' => $enquiry->skill,
        'Languages - Spoken / Written' => $enquiry->language,
        'No. of weeks you can volunteer' => $enquiry->week_no,
		'Willings to travel / stay outsation Y/N' => $enquiry->travel,
        'The month and week you can begin (if selected)' => $enquiry->begin,
        'Any past experience of interning Y/N' => $enquiry->experience,
		'Organizations Name' => $enquiry->organization,
        'Location' => $enquiry->location,
        'Duration Of internship' => $enquiry->internship,
		'Nature of internship' => $enquiry->internship_nature,
        'Project' => $enquiry->project,
        'How did you hear about ETASHA' => $enquiry->about_etasha,
        'Submitted by' => $enquiry->submitted_by,
        'Date' => $this->Time->format($enquiry->submitted_date, 'dd MMM yyyy'),
        'Enquiry Date' => $this->Time->format($enquiry->created, 'dd MMM yyyy'),
    ];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
