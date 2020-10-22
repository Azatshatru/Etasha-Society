<?php
$applicants = [];
foreach($contacts as $enquiry)
{
    $applicants[] = [
        'Name' => $enquiry->name,
        'Oraganisation' => $enquiry->organisation,
        'Age' => $enquiry->age,
        'Profession' => $enquiry->profession,
        'Date for Visit' => $this->Time->format($enquiry->visit_date, 'dd MMM yyyy'),
        'Purpose For Visit' => $enquiry->visit_purpush,
        'How did you hear about ETASHA' => $enquiry->about_first,
		'Comment'=> $enquiry->comment,
		'Enquiry Date' => $this->Time->format($enquiry->created, 'dd MMM yyyy ') 
	];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
