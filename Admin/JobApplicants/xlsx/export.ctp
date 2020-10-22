<?php
/**
 * @author: Manoj Tanwar
 * @date: May 20, 2019
 * @version: 1.0.0
 */

$applicants = [];
foreach($jobApplicants as $jobApplicant)
{
    $applicants[] = [
        'Name' => $jobApplicant->name,
        'Email' => $jobApplicant->email,
        'Mobile' => $jobApplicant->mobile,
        'Post' => $jobApplicant->has('job')?$jobApplicant->job->name:'',
        'Job Type' => $jobApplicant->job_type,
        'Experience' => $jobApplicant->experience,
        'Area Expertise' => $jobApplicant->area_expertise,
		'Qualification' => $jobApplicant->qualification,
		'Resume'=> '=HYPERLINK("http://www.z91.in/'.$imageDir.$jobApplicant->resume_path.'","See Resume")',
		'Date' => $this->Time->format($jobApplicant->created, 'dd MMM yyyy'),
    ];
}

$this->Excel->addWorksheet($applicants, 'Applicants');
